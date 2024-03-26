<?php

namespace App\Http\Controllers;

use App\Models\Book\Book;
use App\Models\Category\Category;
use App\Models\Visit\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends StandardController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        Visit::logPage('Home');
        $this->data['categories'] = Category::getAllActiveParentCategories();
        $this->data['bestSellingBooks'] = Book::getBestSellingBooks();
        foreach ($this->data['categories'] as $key => $category){
            $category['src'] =  $key + 1 . '.jpg';
        }

        if(Auth::user() && count(Auth::user()->categories)){
            $categories = Auth::user()->categories->toArray();
            $ids = array_column($categories, 'id');
            $this->data['preferedCategoriesBooks'] = Book::relatedBooksToACategories($ids);
        }

        return view('pages.home', ['data' => $this->data]);
    }

    public function author()
    {
        return view('pages.author');
    }
}
