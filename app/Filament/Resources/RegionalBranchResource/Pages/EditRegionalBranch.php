<?php

namespace App\Filament\Resources\RegionalBranchResource\Pages;

use App\Filament\Resources\RegionalBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegionalBranch extends EditRecord
{
    protected static string $resource = RegionalBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
