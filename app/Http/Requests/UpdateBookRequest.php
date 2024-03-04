<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'writer-id' => ['required',Rule::exists('users', 'id')->where('role_id',3)],
            'book-id' => ['required',Rule::exists('books', 'id')],
            'book-title-input' => 'required|string',
            'page-count-input' => 'required|numeric|min:1',
            'price-input' => 'required|numeric|min:1',
            'release-date-input' => 'required|date',
            'publisher-input' => ['required',Rule::exists('publishers', 'id')->whereNull('deleted_at')],
            'book-description-input' =>  'required|string',
        ];
    }

    private function checkBookCategories():bool{
        if(is_null($this->input('book-category-cb'))) return  true;

        foreach ($this->input('book-category-cb') as $categoryId){
            $category = Category::find($categoryId)->where([['parent_id','!=',null],['deleted_at','=',null]]);
            if(is_null($category)) return true;
        }
        return false;
    }

    private function checkBookImage():bool{
        if(is_null($this->file('book-image'))) return  false;

        $image = $this->file('book-image');
        $dimensions = getimagesize($image);
        $width = $dimensions[0];
        $height = $dimensions[1];

        if($height/$width < 200/170){
            return true;
        }

        return false;
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                if ($this->checkBookCategories()) {
                    $validator->errors()->add('category', 'Category doesn\'t exists');
                }
                if ($this->checkBookImage()) {
                    $validator->errors()->add('book-image', 'Please upload an image with a maximum size of 700KB and in one of the following formats: jpg, jpeg, or png. Image width needs to be smaller than its height');
                }
            }
        ];
    }

    public function messages() : array
    {
        return [
            'writer-id' => 'Only writer can insert a book',
            'book-id' => 'Book doesn\'t exist',
            'book-image' => 'Please upload an image with a maximum size of 700KB and in one of the following formats: jpg, jpeg, or png. Image width needs to be smaller than its height',
            'book-title-input' => 'Book title can\'t be empty',
            'page-count-input' => 'Page count can\'t be empty or less than 0',
            'price-input' => 'Price can\'t be empty or less than 0',
            'release-date-input' => 'Release date can\'t be empty and can\'t be in future',
            'publisher-input' => 'Publisher can\'t be empty',
            'book-description-input' => "Book description can't be empty",
        ];
    }
}
