<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskResource\Pages;
use App\Filament\Resources\TaskResource\RelationManagers;
use App\Models\Task;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Task';
    protected static ?string $navigationGroup = 'Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required(),
                Forms\Components\TextInput::make('description')
                    ->label('Description')
                    ->required(),
                Forms\Components\Checkbox::make('is_done')
                    ->label('Is Done'),
                Forms\Components\Repeater::make('periodic')
                    ->label('Periodic')
                    ->schema([
                        Forms\Components\Select::make('type')
                            ->label('Type')
                            ->options([
                                'daily' => 'Daily',
                                'weekly' => 'Weekly',
                                'monthly' => 'Monthly',
                                'yearly' => 'Yearly',
                            ]),
                        Forms\Components\TextInput::make('interval')
                            ->label('Interval')
                    ]),
                Forms\Components\Repeater::make('dates')
                    ->label('Dates')
                    ->schema([
                        Forms\Components\DatePicker::make('date')
                            ->label('Date')
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\CheckboxColumn::make('is_done')
                    ->label('Is Done')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }
}
