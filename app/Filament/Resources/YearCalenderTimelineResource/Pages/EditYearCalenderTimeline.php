<?php

namespace App\Filament\Resources\YearCalenderTimelineResource\Pages;

use App\Filament\Resources\YearCalenderTimelineResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditYearCalenderTimeline extends EditRecord
{
    protected static string $resource = YearCalenderTimelineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
