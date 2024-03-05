<?php

namespace App\View\Components\Slider;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WriterArticle extends Component
{
    /**
     * Create a new component instance.
     */
    public $writer;
    public function __construct($writer)
    {
        $this->writer = $writer;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.slider.writer-article');
    }
}
