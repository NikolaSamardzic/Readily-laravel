<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StandardController extends Controller
{
    public array $data;

    protected $headerLinks;
    protected $footerLinks;
    protected $roleId;
    public function __construct()
    {

    }

    protected function getLinks()
    {
        $this->roleId = Auth::user() ? Auth::user()['role_id'] : 4;
        $this->headerLinks = Link::headerLinksForUserRole($this->roleId);
        $this->footerLinks = Link::footerLinksForUserRole($this->roleId);

        $this->data['links'] = $this->headerLinks;
        $this->data['footer'] = $this->footerLinks;
        return view('pages.user.create', ['data' => $this->data]);
    }

}
