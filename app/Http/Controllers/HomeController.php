<?php

namespace App\Http\Controllers;

use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;

class HomeController extends StandardController
{
    public function __construct()
    {
        parent::__construct();
        $this->data["bestSellingBooks"] =[
            [
                "id" => "10",
                "src" => "30.jpg",
                "title" => "Knjiga",
                "idWriter" => "8",
                "writer" => "Ime Prezime",
                "review" => "3"
            ],
            [
                "id" => "10",
                "src" => "30.jpg",
                "title" => "Knjiga",
                "idWriter" => "8",
                "writer" => "Ime Prezime",
                "review" => "3"
            ],
            [
                "id" => "10",
                "src" => "30.jpg",
                "title" => "Knjiga",
                "idWriter" => "8",
                "writer" => "Ime Prezime",
                "review" => "3"
            ],
            [
                "id" => "10",
                "src" => "30.jpg",
                "title" => "Knjiga",
                "idWriter" => "8",
                "writer" => "Ime Prezime",
                "review" => "3"
            ],
            [
                "id" => "10",
                "src" => "30.jpg",
                "title" => "Knjiga",
                "idWriter" => "8",
                "writer" => "Ime Prezime",
                "review" => "3"
            ],
            [
                "id" => "10",
                "src" => "30.jpg",
                "title" => "Knjiga",
                "idWriter" => "8",
                "writer" => "Ime Prezime",
                "review" => "3"
            ],
            [
                "id" => "10",
                "src" => "30.jpg",
                "title" => "Knjiga",
                "idWriter" => "8",
                "writer" => "Ime Prezime",
                "review" => "3"
            ],
            [
                "id" => "10",
                "src" => "30.jpg",
                "title" => "Knjiga",
                "idWriter" => "8",
                "writer" => "Ime Prezime",
                "review" => "3"
            ],
            [
                "id" => "10",
                "src" => "30.jpg",
                "title" => "Knjiga",
                "idWriter" => "8",
                "writer" => "Ime Prezime",
                "review" => "3"
            ],
            [
                "id" => "10",
                "src" => "30.jpg",
                "title" => "Knjiga",
                "idWriter" => "8",
                "writer" => "Ime Prezime",
                "review" => "3"
            ],
            [
                "id" => "10",
                "src" => "30.jpg",
                "title" => "Knjiga",
                "idWriter" => "8",
                "writer" => "Ime Prezime",
                "review" => "3"
            ],
            [
                "id" => "10",
                "src" => "30.jpg",
                "title" => "Knjiga",
                "idWriter" => "8",
                "writer" => "Ime Prezime",
                "review" => "3"
            ],
            [
                "id" => "10",
                "src" => "30.jpg",
                "title" => "Knjiga",
                "idWriter" => "8",
                "writer" => "Ime Prezime",
                "review" => "3"
            ],
            [
                "id" => "10",
                "src" => "30.jpg",
                "title" => "Knjiga",
                "idWriter" => "8",
                "writer" => "Ime Prezime",
                "review" => "3"
            ],
            [
                "id" => "10",
                "src" => "30.jpg",
                "title" => "Knjiga",
                "idWriter" => "8",
                "writer" => "Ime Prezime",
                "review" => "3"
            ],
            [
                "id" => "10",
                "src" => "30.jpg",
                "title" => "Knjiga",
                "idWriter" => "8",
                "writer" => "Ime Prezime",
                "review" => "3"
            ],
            [
                "id" => "10",
                "src" => "30.jpg",
                "title" => "Knjiga",
                "idWriter" => "8",
                "writer" => "Ime Prezime",
                "review" => "3"
            ],
            [
                "id" => "10",
                "src" => "30.jpg",
                "title" => "Knjiga",
                "idWriter" => "8",
                "writer" => "Ime Prezime",
                "review" => "3"
            ],
            [
                "id" => "10",
                "src" => "30.jpg",
                "title" => "Knjiga",
                "idWriter" => "8",
                "writer" => "Ime Prezime",
                "review" => "3"
            ]
        ];
    }

    public function index()
    {
        return view('pages.home', ['data' => $this->data]);
    }
}
