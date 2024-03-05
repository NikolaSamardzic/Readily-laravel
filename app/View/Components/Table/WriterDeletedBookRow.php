<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WriterDeletedBookRow extends Component
{
    /**
     * Create a new component instance.
     */
    public $book;
    public $user;
    public function __construct($book,$user)
    {
        $this->book = $book;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.writer-deleted-book-row');
    }
}
