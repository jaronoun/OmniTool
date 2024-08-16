<?php

namespace App\Filament\Resources\LogResource\Pages;

use App\Filament\Resources\LogResource;
use App\Filament\Resources\TaskLogsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTaskLogs extends ListRecords
{
    protected static string $resource = TaskLogsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
