<?php

namespace App\Livewire;

use App\Models\CalenderTimeline;
use Carbon\Carbon;
use Livewire\Component;

class TimelineCalender extends Component
{
    public function render()
    {
        $timelineCalenders = CalenderTimeline::get();

        $groupTimelineCalenders = $timelineCalenders->groupBy(function ($item) {
            return Carbon::parse($item->date)->format('F Y');
        });

        // dd($groupTimelineCalenders);
        return view('livewire.timeline-calender', compact('groupTimelineCalenders'));
    }
}
