<?php

namespace App\Filament\Resources\ExerciseExecutedResource\Pages;

use App\Filament\Resources\ExerciseExecutedResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExerciseExecuted extends EditRecord
{
    protected static string $resource = ExerciseExecutedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
