<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    public static function getAllActiveCategories()
    {
        $sortedCategories = [];
        $categories = self::select('categories.id','categories.name', 'parent.name AS parent_name')
                            ->leftJoin('categories as parent', 'parent.id', '=', 'categories.parent_id')
                            ->where([
                                ['parent.deleted_at',null],
                                ['categories.deleted_at',null]
                            ])
                            ->orderBy('categories.parent_id','ASC')
                            ->get();

        foreach ($categories as $category){
            if($category['parent_name']){
                $sortedCategories[$category['parent_name']][] = $category;
            }else{
                $sortedCategories[$category['name']] = [];
            }
        }

        return $sortedCategories;
    }

    public static function childrenIds($id){
        $children = self::query()->select('id')->where('parent_id','=',$id)->get();
//
//        $ids = [];
//        foreach ($children as $child){
//            $ids[] = $child['id'];
//        }

        return $children->toArray();
    }

    public static function getRelatedCategories(array $relatedCategoriesIDs)
    {

        $valuesNotIn[] = 0;
        $resultsArray = [];

        $parents = self::select('parent.id', 'parent.name')
            ->distinct()
            ->from('categories as parent')
            ->join('categories as child', 'child.parent_id', '=', 'parent.id')
            ->whereNull('parent.deleted_at')
            ->whereIn('child.id', $relatedCategoriesIDs )
            ->get();

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

        return $resultsArray;

    }

    public static function getAllActiveParentCategories()
    {

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

        return $resultsArray;
    }


    public function books() : BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
