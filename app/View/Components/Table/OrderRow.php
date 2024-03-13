<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OrderRow extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $order
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.order-row');
    }
}
