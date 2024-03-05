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

    public static function getRelatedCategories(array $relatedCategoriesIDs)
    {
        return self::select('parent.id', 'parent.name')
            ->distinct()
            ->from('categories as parent')
            ->join('categories as child', 'child.parent_id', '=', 'parent.id')
            ->whereNull('parent.deleted_at')
            ->whereIn('child.id', $relatedCategoriesIDs )
            ->get();

//        return self::whereIn('id', $relatedCategoriesIDs)->get();
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
