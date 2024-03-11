<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Doctrine\DBAL\Schema\View;
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

//        $test = [];
//        $test[] = $this->data['bestSellingBooks'][0]->toArray();
//        $test[] = $this->data['preferedCategoriesBooks'][0]->toArray();
//        dd($test);

        //dd()


        return view('pages.home', ['data' => $this->data]);
    }
}
