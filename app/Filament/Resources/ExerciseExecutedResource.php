<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExerciseExecutedResource\Pages;
use App\Filament\Resources\ExerciseExecutedResource\RelationManagers;
use App\Models\ExerciseExecuted;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExerciseExecutedResource extends Resource
{
    protected static ?string $model = ExerciseExecuted::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Exercise Executed';

    protected static ?string $navigationGroup = 'Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_exercise_id')
                    ->label('User Exercise')
                    ->options(\App\Models\UserExercise::all()->pluck('name', 'id')->toArray())
                    ->required(),
                Forms\Components\Repeater::make('sets')
                    ->label('Sets')
                    ->schema([
                        Forms\Components\TextInput::make('weight')
                            ->label('Weight')
                            ->suffix('kg'),
                        Forms\Components\TextInput::make('reps')
                            ->label('Reps')
                            ->suffix('reps'),
                        Forms\Components\TextInput::make('time')
                            ->label('Time')
                            ->suffix('seconds')
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_exercise_id')
                    ->searchable()
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
            'index' => Pages\ListExerciseExecuteds::route('/'),
            'create' => Pages\CreateExerciseExecuted::route('/create'),
            'edit' => Pages\EditExerciseExecuted::route('/{record}/edit'),
        ];
    }
}
