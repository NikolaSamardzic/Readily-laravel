<?php

namespace App\View\Components\Fixed;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FooterLink extends Component
{

    public function __construct(
        public $link
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fixed.footer-link');
    }
}
