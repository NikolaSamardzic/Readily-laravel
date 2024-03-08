<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class CommentRequest extends FormRequest
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
       // try {
            return [
                'book-id' => 'required|numeric',
                'comment-input' =>  'required|regex:/(\s.*){4,}/',
            ];
//        }catch (\Illuminate\Validation\ValidationException $th){
//            return $th->validator->errors();
//        }
    }

    private function checkImages()
    {
        if(empty($this->allFiles()['comment-image'])) return false;
        if(count($this->allFiles()['comment-image'])>3) return true;

        $totalSize = 0;
        foreach ($this->allFiles()['comment-image'] as $file){
            $totalSize += $file->getSize() / 1000;

            if(!in_array($file->getMimeType(),['image/jpeg', 'image/jpg', 'image/png'])) return true;
        }

        if($totalSize > 2000) return true;

        return false;
    }


    public function after(): array
    {
        //try {
            return [
                function (Validator $validator) {
                    if ($this->checkImages()) {
                        $validator->errors()->add('images', 'Supported image formats include JPG, JPEG, and PNG, with a total file size limit of 2MB for all images combined.');
                    }
                }
            ];
//        }catch (\Illuminate\Validation\ValidationException $th){
//            return $th->validator->errors();
//        }

    }


    public function messages() : array
    {
        return [
            'comment-input' => 'There must be at least 5 words.',
        ];
    }
}
