<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeadlineResource\Pages;
use App\Filament\Resources\DeadlineResource\RelationManagers;
use App\Models\Deadline;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use ValentinMorice\FilamentJsonColumn\FilamentJsonColumn;

class DeadlineResource extends Resource
{
    protected static ?string $model = Deadline::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Deadline';

    protected static ?string $navigationGroup = 'Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->options(
                        User::all()->pluck('name', 'id')->toArray()
                    )
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required(),
                Forms\Components\TextInput::make('description')
                    ->label('Description')
                    ->required(),
                Forms\Components\Checkbox::make('is_done')
                    ->label('Is Done'),
                Forms\Components\Repeater::make('dates')
                    ->label('Dates')
                    ->schema([
                        Forms\Components\DateTimePicker::make('start')
                            ->label('Date')
                            ->required(),
                        Forms\Components\DateTimePicker::make('end')
                            ->label('End')
                            ->required(),

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
            'index' => Pages\ListDeadlines::route('/'),
            'create' => Pages\CreateDeadline::route('/create'),
            'edit' => Pages\EditDeadline::route('/{record}/edit'),
        ];
    }
}
