<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Category;
use App\Models\Image;
use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;

class BookController extends StandardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $this->data['user'] = $user;
        $this->data['activeBooks'] = Book::activeBooks($user['id']);
        $this->data['deletedBooks'] = Book::deletedBooks($user['id']);

        return view('pages.book.index', ['data' => $this->data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        $this->data['user'] = $user;
        $this->data['publishers'] = Publisher::getAllActivePublishers();
        $this->data['categories'] = Category::getAllActiveCategories();

        return view('pages.book.create', ['data' => $this->data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBookRequest $request)
    {
        $bookData = $request->only('writer-id', 'book-title-input', 'page-count-input', 'price-input', 'release-date-input','publisher-input','book-description-input',);
        try {
            DB::beginTransaction();

            $imageName = time() . '.' . $request->file('book-image')->extension();
            $image = Image::createImage($imageName,$request->input('book-title-input'));

            $manager = new ImageManager(new Driver());

            $largeImage = $manager->read($request->file('book-image')->get());
            $smallImage = $manager->read($request->file('book-image')->get());

            $largeImage->scale(height: 400)->encode(new AutoEncoder(quality: 100))->save('assets/images/books/large/' . $image['src']);
            $smallImage->scale(height: 200)->encode(new AutoEncoder(quality: 75))->save('assets/images/books/small/' . $image['src']);

            $bookData['image_id'] = $image['id'];

            $book = Book::insertBook($bookData);

            BookCategory::insertBookCategories($book['id'],$request->input('book-category-cb'));

            DB::commit();

        }catch (\Exception $e){
            DB::rollBack();

            if(isset($imageName) && File::exists(public_path('/assets/img/books/large/' . $imageName))){
                File::delete(public_path('/assets/img/books/large/' . $imageName));
                File::delete(public_path('/assets/img/books/small/' . $imageName));
            }

            return redirect()->back()->with('error-msg', 'An error has occurred, please try again later.');
        }

        return back()->with('success-msg', "Book has been successfully added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, $bookId)
    {
        $this->data['user'] = $user;
        $this->data['book'] = Book::getBook($bookId);
        $this->data['publishers'] = Publisher::getAllActivePublishers();
        $this->data['categories'] = Category::getAllActiveCategories();

        $this->data['selected_categories'] = [];
        foreach ($this->data['book']->categories as $category)
            $this->data['selected_categories'][] = $category['id'];

        return view('pages.book.edit', ['data' => $this->data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $bookData = $request->only('writer-id','book-id', 'book-title-input', 'page-count-input', 'price-input', 'release-date-input','publisher-input','book-description-input',);
        $bookData['image_id'] = $book['image_id'];
        try {
            DB::beginTransaction();
            if(!is_null($request->file('book-image'))){

                $oldImageName = $book->image['src'];
                $imageName = time() . '.' . $request->file('book-image')->extension();
                $image = Image::updateImage($book->image['id'],$imageName);

                $manager = new ImageManager(new Driver());

                $largeImage = $manager->read($request->file('book-image')->get());
                $smallImage = $manager->read($request->file('book-image')->get());

                $largeImage->scale(height: 400)->encode(new AutoEncoder(quality: 100))->save('assets/images/books/large/' . $image['src']);
                $smallImage->scale(height: 200)->encode(new AutoEncoder(quality: 75))->save('assets/images/books/small/' . $image['src']);

                File::delete(public_path('assets/images/books/large/' . $oldImageName));
                File::delete(public_path('assets/images/books/small/' . $oldImageName));

                $bookData['image_id'] = $image['id'];
            }
            Book::updateBook($bookData);


            $oldBookCategories = $book->categories()->pluck('category_id')->toArray();
            $newBookCategories = $request->input('book-category-cb');

            $addedCategories = array_diff($newBookCategories, $oldBookCategories);
            $deletedCategories = array_diff($oldBookCategories, $newBookCategories);

            BookCategory::insertBookCategories($book['id'],$addedCategories);
            BookCategory::deleteBookCategories($book['id'],$deletedCategories);

            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();

            if(isset($imageName) && File::exists(public_path('/assets/img/books/large/' . $imageName))){
                File::delete(public_path('/assets/img/books/large/' . $imageName));
                File::delete(public_path('/assets/img/books/small/' . $imageName));
            }

            return redirect()->back()->with('error-msg', 'An error has occurred, please try again later.');
        }

        return redirect()->route('books.edit', ['book' => $book['id'], 'user' => $request->input('writer-id')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $book = Book::deleteBook($id);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], $e->getCode());
        }

        return response()->json(['success' => true,'message' => 'Book deleted successfully', 'book' => $book]);
    }

    public function activate(string $id){
        try {
            DB::beginTransaction();
            $book = Book::activateBook($id);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], $e->getCode());
        }

        return response()->json(['success' => true,'message' => 'Book activated successfully', 'book' => $book]);

    }
}
