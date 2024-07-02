<?php

namespace App\Filament\Resources\UserExerciseResource\Pages;

use App\Filament\Resources\UserExerciseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserExercise extends EditRecord
{
    protected static string $resource = UserExerciseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
