<?php

namespace App\Filament\Resources\ManageMemberResource\Pages;

use App\Filament\Resources\ManageMemberResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListManageMembers extends ListRecords
{
    protected static string $resource = ManageMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
