<?php

namespace App\View\Components\Fixed;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavigationLink extends Component
{
    /**
     * Create a new component instance.
     */
    public string $href;
    public string $name;

    public function __construct($href="#", $name="Test")
    {
        $this->name=$name;
        $this->href=$href;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fixed.navigation-link');
    }
}
