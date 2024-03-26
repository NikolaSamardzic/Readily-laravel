<?php

namespace App\View\Components\Form;

use App\Models\User\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextArea extends Component
{
    /**
     * Create a new component instance.
     */
    public $displayBiography = 0;
    public function __construct(
        public $userID = 0
    )
    {

        if($this->userID){
            $user = User::getUser($this->userID);
//            dd($user);
            if ($user['role_id']==3) $this->displayBiography = 1;
        }

//        dd($this->displayBiography);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.text-area');
    }
}
