<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserExerciseResource\Pages;
use App\Filament\Resources\UserExerciseResource\RelationManagers;
use App\Models\UserExercise;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserExerciseResource extends Resource
{
    protected static ?string $model = UserExercise::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'User Exercise';
    protected static ?string $navigationGroup = 'User';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required(),
                Forms\Components\Select::make('exercise_id')
                    ->label('Exercise')
                    ->options(\App\Models\Exercise::all()->pluck('name', 'id')->toArray())
                    ->required(),
                Forms\Components\Select::make('training_id')
                    ->label('Training')
                    ->options(\App\Models\Training::all()->pluck('name', 'id')->toArray())
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
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('exercise_id')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('training_id')
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
            'index' => Pages\ListUserExercises::route('/'),
            'create' => Pages\CreateUserExercise::route('/create'),
            'edit' => Pages\EditUserExercise::route('/{record}/edit'),
        ];
    }
}
