<?php

namespace App\Livewire;

use App\Models\Gallery as ModelsGallery;
use Livewire\Component;
use Livewire\WithPagination;

class Gallery extends Component
{
    use WithPagination;
    public $paginationTheme = 'bootstrap';


    public function render()
    {
        $galleries = ModelsGallery::orderByDesc('created_at')->paginate(12);
        return view('livewire.gallery', compact('galleries'));
    }
}
