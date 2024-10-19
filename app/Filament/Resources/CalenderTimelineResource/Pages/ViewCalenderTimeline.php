<?php

namespace App\Filament\Resources\CalenderTimelineResource\Pages;

use App\Filament\Resources\CalenderTimelineResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCalenderTimeline extends ViewRecord
{
    protected static string $resource = CalenderTimelineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
