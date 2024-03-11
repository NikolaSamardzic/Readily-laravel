<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Category;
use App\Models\UserCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function preferred(Request $request){


        foreach ($request->input('checkbox-prefered-categories') as $categoryId){
            UserCategory::create([
                'category_id' => $categoryId,
                'user_id' => auth()->user()->getAuthIdentifier()
            ]);
        }

        $books = Book::query()
            ->select(DB::raw('IFNULL(CEIL(AVG(reviews.stars)),0)  AS review'),'books.name as name','users.id as user_id','images.src as src', 'books.id as id', 'users.first_name as first_name', 'users.last_name as last_name')
            ->from('books')
            ->join('images','images.id','=','books.image_id')
            ->join('users','users.id','=','books.user_id')
            ->leftJoin('reviews','reviews.book_id','=','books.id')
            ->join('book_category','book_category.book_id','=','books.id')
            ->join('categories as child','child.id','=','book_category.category_id')
            ->join('categories as parent','parent.id','=','child.parent_id')
            ->whereIn('parent.id',$request->input('checkbox-prefered-categories'))
            ->groupBy('name','user_id','src','id','first_name','last_name')->inRandomOrder()->limit(20)->get();

        $hasPreferedCategories = cookie('hasPreferedCategories', json_encode($request->input('checkbox-prefered-categories')), 120,null,null,null,false,true);
        return response()->json(['books'=>$books],200)->cookie($hasPreferedCategories);
    }
    public function activeChildren(){

        $valuesNotIn[] = 0;
        $resultsArray = [];

        $parents = Category::query()->whereNull('parent_id')->get();

        for($i=0;$i<count($parents);$i++){


            $book = Book::query()
                ->select('books.id', 'images.src', DB::raw('1 AS category_name'), DB::raw('1 AS category_id'))
                ->join('book_category','book_category.book_id','=','books.id')
                ->join('images','images.id','=','books.image_id')
                ->whereIn('book_category.category_id',function ($query) use ($parents,$i){
                    $query->select('child.id')
                    ->from('categories as parent')
                    ->join('categories as child', 'parent.id', '=', 'child.parent_id')
                    ->where('parent.id', '=', $parents[$i]['id']);
                })
                ->whereNotIn('books.id',$valuesNotIn)
                ->groupBy('books.id','images.src')
                ->first();


            $result = $book->toArray();
            $result['category_name'] = $parents[$i]['name'];
            $result['category_id'] = $parents[$i]['id'];
            $valuesNotIn[] = $result['id'];
            $resultsArray[] = $result;
        }

        return response()->json(['success' => true, 'categories' => $resultsArray]);
    }
}
