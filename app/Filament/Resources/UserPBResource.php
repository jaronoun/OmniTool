<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserPBResource\Pages;
use App\Filament\Resources\UserPBResource\RelationManagers;
use App\Models\Exercise;
use App\Models\User;
use App\Models\UserPB;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserPBResource extends Resource
{
    protected static ?string $model = UserPB::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'User PB';

    protected static ?string $navigationGroup = 'User';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->options(
                        User::all()->pluck('name', 'id')->toArray()
                    ),
                Forms\Components\Select::make('exercise_id')
                    ->label('Exercise')
                    ->options(
                        Exercise::all()->pluck('name', 'id')->toArray()
                    ),
                Forms\Components\TextInput::make('weight')
                    ->label('Weight')
                    ->suffix('kg'),
                Forms\Components\TextInput::make('reps')
                    ->label('Reps')
                    ->suffix('reps'),
                Forms\Components\TextInput::make('time')
                    ->label('Time')
                    ->suffix('seconds'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListUserPBS::route('/'),
            'create' => Pages\CreateUserPB::route('/create'),
            'edit' => Pages\EditUserPB::route('/{record}/edit'),
        ];
    }
}
