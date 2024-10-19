<?php

namespace App\Filament\Resources\YearCalenderTimelineResource\Pages;

use App\Filament\Resources\YearCalenderTimelineResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewYearCalenderTimeline extends ViewRecord
{
    protected static string $resource = YearCalenderTimelineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
