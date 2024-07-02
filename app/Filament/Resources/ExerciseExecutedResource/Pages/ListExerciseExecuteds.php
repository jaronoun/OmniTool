<?php

namespace App\Filament\Resources\ExerciseExecutedResource\Pages;

use App\Filament\Resources\ExerciseExecutedResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExerciseExecuteds extends ListRecords
{
    protected static string $resource = ExerciseExecutedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
