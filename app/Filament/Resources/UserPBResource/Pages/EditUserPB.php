<?php

namespace App\Filament\Resources\UserPBResource\Pages;

use App\Filament\Resources\UserPBResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserPB extends EditRecord
{
    protected static string $resource = UserPBResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
