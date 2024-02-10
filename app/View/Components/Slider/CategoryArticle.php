<?php

namespace App\View\Components\Slider;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryArticle extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $src,
        public string $title
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.slider.category-article');
    }
}
