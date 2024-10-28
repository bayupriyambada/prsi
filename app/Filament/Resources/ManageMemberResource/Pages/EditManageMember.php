<?php

namespace App\Filament\Resources\ManageMemberResource\Pages;

use App\Filament\Resources\ManageMemberResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditManageMember extends EditRecord
{
    protected static string $resource = ManageMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
