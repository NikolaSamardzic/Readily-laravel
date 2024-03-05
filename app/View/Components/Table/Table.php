<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use function Symfony\Component\Translation\t;

class Table extends Component
{
    /**
     * Create a new component instance.
     */
    public array $columnTitles;
    public function __construct($columnTitles)
    {
        $this->columnTitles = $columnTitles;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.table');
    }
}
