<?php

namespace App\Livewire\Front;

use App\Models\Blog;
use App\Models\Sliders;
use App\Models\Sponsor;
use Livewire\Component;
use App\Models\RegionalBranch;
use App\Models\CalenderTimeline;
use App\Http\Resources\Blog\BlogInfoResource;

class Index extends Component
{
    public function render()
    {
        $sliders = Sliders::get();
        $regionalBranches = RegionalBranch::limit(8)->orderBy('created_at', 'asc')->get();
        $sponsors = Sponsor::where('status', 'sponsor')->get();
        $coSponsors = Sponsor::where('status', 'co-sponsor')->get();

        $blogs = Blog::withoutTrashed()->isPublished(true)
            ->with(['category', 'user', 'regional'])
            ->orderByDesc('created_at')->limit(6)->get();
        $blogsResource = BlogInfoResource::collection($blogs)->resolve();

        $timelineCalenders = CalenderTimeline::limit(8)->orderBy('created_at', 'desc')->get();

        return view('livewire.front.index', [
            'sliders' => $sliders,
            'regionalBranches' => $regionalBranches,
            'sponsors' => $sponsors,
            'coSponsors' => $coSponsors,
            'blogs' => $blogsResource,
            'calendars' => $timelineCalenders
        ]);
    }
}
