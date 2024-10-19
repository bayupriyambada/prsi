<?php

namespace App\View\Components\Custom\Shared\Item;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GalleryItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.custom.shared.item.gallery-item');
    }
}
