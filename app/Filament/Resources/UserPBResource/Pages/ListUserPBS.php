<?php

namespace App\Filament\Resources\UserPBResource\Pages;

use App\Filament\Resources\UserPBResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserPBS extends ListRecords
{
    protected static string $resource = UserPBResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
