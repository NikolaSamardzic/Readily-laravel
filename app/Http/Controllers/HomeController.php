<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;

class HomeController extends StandardController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->data['categories'] = Category::getAllActiveParentCategories();
        $this->data['bestSellingBooks'] = Book::getBestSellingBooks();
        foreach ($this->data['categories'] as $key => $category){
            $category['src'] =  $key + 1 . '.jpg';
        }

        return view('pages.home', ['data' => $this->data]);
    }
}
