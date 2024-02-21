<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StandardController extends Controller
{
    public array $data;


    public function __construct()
    {

        $this->data['links'] = [
            [
                "href" => "http://127.0.0.1:8000",
                "name" => "Home"
            ],
            [
                "href" => "http://127.0.0.1:8000/shop",
                "name" => "Shop"
            ],
            [
                "href" => "http://127.0.0.1:8000/users/create",
                "name" => "Sing Up"
            ],
            [
                "href" => "http://127.0.0.1:8000/login",
                "name" => "Log in"
            ]
        ];


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
