<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Book\Book;
use App\Models\Category\Category;
use App\Models\User\UserCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends StandardController
{

    public function index()
    {
        $this->data['activeCategories'] = Category::getAllActive();
        $this->data['deletedCategories'] = Category::getAllDeleted();


        return view('pages.admin.category.index',['data'=>$this->data]);
    }

    public function create()
    {
        $this->data['parentCategories'] = Category::getParents();

        return view('pages.admin.category.create',['data'=>$this->data]);
    }

    public function store(CategoryRequest $request)
    {
        try {
            DB::beginTransaction();
            Category::storeCategory($request->input('category-name'),$request->input('select-category'));
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();

            return redirect()->back()->with('error','There is an error please try later.');
        }

        return redirect()->back()->with('success','You successfully added a new category!');
    }

    public function edit(string $id)
    {
        $this->data['parentCategories'] = Category::getParents();
        $this->data['category'] = Category::getCategoryWithId($id);


        return view ('pages.admin.category.edit',['data'=>$this->data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
       // dd($request->input('select-category'));
        try {
            DB::beginTransaction();
            Category::updateCategory($id,$request->input('category-name'),$request->input('select-category'));
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error','There is an error, please try later');
        }

        return redirect()->back()->with('success','Updated successfully!');
    }

    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            Category::deleteCategoryWithId($id);
            Category::deleteChildrenWithParentId($id);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();

            return response()->json(['success' => false,'message' => $e],$e->getCode());
        }

        return response()->json(['success' => true,'message' => 'Category deleted successfully']);
    }

    public function activate($id)
    {
        try {
            DB::beginTransaction();
            Category::activateCategoryWithId($id);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();

            return response()->json(['success' => false,'message' => $e],$e->getCode());
        }

        return response()->json(['success' => true,'message' => 'Category activated successfully']);
    }



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
