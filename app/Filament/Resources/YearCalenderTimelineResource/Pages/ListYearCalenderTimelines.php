<?php

namespace App\Filament\Resources\YearCalenderTimelineResource\Pages;

use App\Filament\Resources\YearCalenderTimelineResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListYearCalenderTimelines extends ListRecords
{
    protected static string $resource = YearCalenderTimelineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
