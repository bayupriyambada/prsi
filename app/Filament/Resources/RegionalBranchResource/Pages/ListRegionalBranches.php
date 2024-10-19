<?php

namespace App\Filament\Resources\RegionalBranchResource\Pages;

use App\Filament\Resources\RegionalBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRegionalBranches extends ListRecords
{
    protected static string $resource = RegionalBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
