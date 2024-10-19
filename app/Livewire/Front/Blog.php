<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use App\Models\Blog as ModelsBlog;
use App\Http\Resources\Blog\BlogInfoResource;
use App\Models\RegionalBranch;

class Blog extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    // #[Url]
    // public $search;
    // #[Url]
    // public $category;

    public $filters = [
        'search' => '',
        'category' => '',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->filters = [
            'search' => '',
            'category' => '',
        ];
    }

    public function render()
    {
        $blogs = ModelsBlog::query();
        if ($this->filters['search']) {
            $blogs = $blogs->where('title', 'like', '%' . $this->filters['search'] . '%');
        }

        if ($this->filters['category']) {
            $blogs = $blogs->whereHas('category', function ($query) {
                $query->where('title', $this->filters['category']);
            });
        }

        $blogs = $blogs
            ->isPublished(true)
            ->select('id', 'title', 'slug', 'tags', 'image', 'created_at', 'category_id', 'user_id')
            ->with([
                'category:id,title',
                'user',
                'user.regional'
            ])
            ->orderByDesc('created_at')
            ->paginate(12);

        $blogs = BlogInfoResource::collection($blogs);
        $categories = Category::select('id', 'title')->get();
        $regional = RegionalBranch::select('id', 'name')->get();

        return view('livewire.front.blog', [
            'blogs' => $blogs,
            'categories' => $categories,
            'regional' => $regional

        ]);
    }
}
