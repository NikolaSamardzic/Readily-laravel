<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LogUserRow extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $log
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.log-user-row');
    }
}
