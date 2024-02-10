<?php

namespace App\View\Components\Fixed;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FooterLink extends Component
{

    public string $href;
    public string $name;
    public string $target;
    public function __construct($name,$href,$target="")
    {
        $this->name=$name;
        $this->href=$href;
        $this->target=$target;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fixed.footer-link');
    }
}
