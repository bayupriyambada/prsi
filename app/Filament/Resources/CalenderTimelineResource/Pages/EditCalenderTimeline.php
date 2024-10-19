<?php

namespace App\Filament\Resources\CalenderTimelineResource\Pages;

use App\Filament\Resources\CalenderTimelineResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCalenderTimeline extends EditRecord
{
    protected static string $resource = CalenderTimelineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
