<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StandardController extends Controller
{
    public array $data;

    protected $links;
    private $roleId;
    public function __construct()
    {
        $this->roleId = Auth::user() ? Auth::user()['role_id'] : 4;
        $this->links = Link::headerLinksForUserRole($this->roleId);

        $this->data['links'] = $this->links;


        $this->data['footer'] = [
            "documentLinks" => [
                [
                    "href" => "#",
                    "name" => "Author",
                    "target" => "_self"
                ],
                [
                    "href" => "#",
                    "name" => "Documentation",
                    "target" => "_blank"
                ],
                [
                    "href" => "#",
                    "name" => "GitHub",
                    "target" => "_blank"
                ],
                [
                    "href" => "#",
                    "name" => "RSS",
                    "target" => "_blank"
                ],
                [
                    "href" => "#",
                    "name" => "Sitemap",
                    "target" => "_blank"
                ]
            ],
            "socialMediaLinks" => [
                [
                    "href" => "#",
                    "name" => "Facebook",
                    "target" => "_blank"
                ],
                [
                    "href" => "#",
                    "name" => "Instagram",
                    "target" => "_blank"
                ],
                [
                    "href" => "#",
                    "name" => "Twitter",
                    "target" => "_blank"
                ]
            ],
            "pageLinks" => [
                [
                    "href" => "#",
                    "name" => "Home",
                    "target" => "_self"
                ],
                [
                    "href" => "#",
                    "name" => "Shop",
                    "target" => "_self"
                ],
                [
                    "href" => "#",
                    "name" => "Sign up",
                    "target" => "_self"
                ],
                [
                    "href" => "#",
                    "name" => "Log in",
                    "target" => "_self"
                ]
            ]
        ];

    }


}
