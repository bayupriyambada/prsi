<?php

namespace App\Livewire\Blog;

use App\Http\Resources\Blog\BlogDetailResource;
use App\Models\Blog;
use Livewire\Component;
use App\Http\Resources\Blog\BlogInfoResource;

class Detail extends Component
{
    public $blog, $blogRecentWithRegional;

    public function mount($slug)
    {
        $this->detailBlog($slug);
    }

    public function detailBlog($slug)
    {
        $blog = Blog::with(['user', 'category'])->isPublished(true)->where('slug', $slug)->firstOrFail();
        $this->blog = (new BlogDetailResource($blog))->toArray(request());
    }

    public function render()
    {
        return view('livewire.blog.detail', [
            'blog' => $this->blog
        ]);
    }
}
