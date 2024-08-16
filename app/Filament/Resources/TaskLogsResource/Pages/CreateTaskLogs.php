<?php

namespace App\Filament\Resources\LogResource\Pages;

use App\Filament\Resources\LogResource;
use App\Filament\Resources\TaskLogsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTaskLogs extends CreateRecord
{
    protected static string $resource = TaskLogsResource::class;
}
