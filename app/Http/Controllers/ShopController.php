<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Sort;
use App\Models\Visit;
use Illuminate\Http\Request;

class ShopController extends StandardController
{
    public function index(Request $request){

        $decodedQueryString = urldecode($request->getQueryString());

        parse_str($decodedQueryString,$parameters);

        $query = Book::query()->selectRaw('COUNT(book_order.book_id) as count, IFNULL(CEIL(AVG(reviews.stars)),0)  AS review , books.id,images.src,  books.name, books.price, books.user_id, books.release_date,images.alt, books.image_id, users.first_name, users.last_name')
            ->leftJoin('book_order','book_order.book_id','=','books.id')
            ->groupBy('books.id','books.name','books.price','books.user_id','books.release_date','books.image_id','users.first_name','users.last_name','images.src','images.alt')
            ->join('users','users.id','=','books.user_id')
            ->leftJoin('reviews','reviews.book_id','=','books.id')
            ->join('images','images.id','=','books.image_id');

        if(array_key_exists('search',$parameters) && !empty($parameters['search'])){
            $query->where('name','LIKE', '%'.$parameters['search'].'%');
        }

        if(array_key_exists('price-min',$parameters) && !empty($parameters['price-min'])){
            $query->where('price','>',$parameters['price-min']);
        }

        if(array_key_exists('price-max',$parameters) && !empty($parameters['price-max'])){

            $query->where('price','<',$parameters['price-max']);
        }

        if(array_key_exists('book-category',$parameters)){
            $query->whereHas('categories', function ($q) use ($parameters){
                $q->whereIn('categories.id',$parameters['book-category']);
            });
        }


        if(!array_key_exists('sort',$parameters)) $parameters['sort'] = 'popular';
        switch($parameters['sort']){
            case 'popular':
                $query->orderBy('count','DESC');
                break;
            case 'newest':
                $query->orderBy('books.release_date','DESC');
                break;
            case 'price-asc':
                $query->orderBy('books.price','ASC');
                break;
            case 'price-desc':
                $query->orderBy('books.price','DESC');
                break;
            case 'name-asc':
                $query->orderBy('books.name','ASC');
                break;
            case 'name-desc':
                $query->orderBy('books.name','DESC');
                break;
            default:
                $query->orderBy('count','DESC');
        }

        $page = 1;
        if(array_key_exists('page',$parameters)) $page = $parameters['page'];

        $books = $query->paginate(20,['*'],'page',$page)->withQueryString();

        if($request->ajax()){
            return response()->json($books);
        }

        Visit::logPage('Shop');
        $this->data['query'] = $books;
        $this->data['parameters'] = $parameters;


        $this->data['sortOptions'] = Sort::all();
        $this->data['categories'] = Category::getAllActiveCategories();
        return view('pages.shop',['data' => $this->data]);
    }
}
