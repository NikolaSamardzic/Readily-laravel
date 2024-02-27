<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

    class CreateUserRequest extends FormRequest
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
            'first-name-input' => 'required|string|regex:/^[A-ZŠĐĆČŽ][a-zšđčćž]{2,}( [A-ZŠĐĆČŽ][a-zšđčćž]{2,})*$/',
            'last-name-input' => 'required|string|regex:/^[A-ZŠĐĆČŽ][a-zšđčćž]{2,}( [A-ZŠĐĆČŽ][a-zšđčćž]{2,})*$/',
            'username-input' => 'required|string|regex:/^[a-zA-Z0-9.šđžćčČĆŠĐŽ()\/\-_]{5,}$/|unique:users,username',
            'password-input' => 'required|string|regex:/^(?=.*[a-zšđčćž])(?=.*[A-ZČĆŽŠĐ])(?=.*\d)(?=.*[._()\/\-])[A-ZŠĐĆŽČa-zšđčćž\d._()\/\-]{5,}$/',
            'email-input' => 'required|email:rfc',
            'phone-input' => 'required|string|regex:/^\d{5,15}$/',
            'role-input' =>  ['required', Rule::in(['2', '3']),],
            'biography-input' =>  'nullable|regex:/(\s.*){4,}/',
            'address-line-input' => 'nullable|string|regex:/^[a-zšđžćčA-ZŠĐŽĆČ0-9\s.\-#\/,]+$/',
            'number-input' => 'nullable|alpha_num:ascii|regex:/^\d+[a-zA-Z]?$/',
            'city-input' => 'nullable|string|regex:/^([A-ZŠĐŽĆČ][a-zšđžćč]{2,}\s?)+$/',
            'state-input' => 'nullable|string|regex:/^([A-ZŠĐČĆŽ][a-zšđčćž]{2,}\s?)+$/',
            'zip-code-input' => 'nullable|alpha_num:ascii|regex:/^\d{5,15}$/',
            'country-input' => 'nullable|string|regex:/^([A-ZŠĐČĆŽ][a-zšđčćž]{2,}\s?)+$/',
            'user-avatar' => 'nullable|file|mimes:jpg,png|max:700'
        ];
    }

    public function checkAddress() : bool
    {
        $addressFields = [
            $this->input('address-line-input'),
            $this->input('number-input'),
            $this->input('city-input'),
            $this->input('state-input'),
            $this->input('zip-code-input'),
            $this->input('country-input'),
        ];

        $filledFields = array_filter($addressFields, function ($field) {
            return !is_null($field);
        });

        if (count($filledFields) > 0 && count($filledFields) < count($addressFields)) {
            return true;
        }

        return false;
    }

    public function checkBiography() : bool
    {
        return $this->input('role-input') == 3 && is_null($this->input('biography-input'));
    }


    public function after(): array
    {
        return [
            function (Validator $validator) {
                if ($this->checkAddress()) {
                    $validator->errors()->add('address', 'Either fill all address fields or leave them all empty.');
                }
                if ($this->checkBiography()) {
                    $validator->errors()->add('biography', 'Writer must have a biography.');
                }
            }
        ];
    }

    public function messages() : array
    {
        return [
            'first-name-input' => 'Incorrect format for first name (ex. Joe)',
            'last-name-input' => 'Incorrect format for last name (ex. Smith)',
            'username-input' => 'Your username must be at least 5 characters long and can only contain letters, numbers, periods, parentheses, forward slashes, hyphens, and underscores.',
            'password-input' => 'Your password must be at least 5 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character from the set of periods, parentheses, forward slashes, hyphens, and underscores (' . ',  \'_\', \'-\',  \'/\', \'()\').',
            'email-input' => 'Incorrect format for email (ex. jhonsmith@gmail.com)',
            'phone-input' => 'Incorrect format for phone (ex. 0611234567)',
            'role-input' => "Role doesn't exist",
            'biography-input' => 'There must be at least 5 words for your biography',
            'address-line-input' => 'Please enter a valid address name.',
            'number-input' => 'Please enter a valid address number.',
            'city-input' => 'Incorrect format for city (ex.  Los Angeles)',
            'state-input' => 'Incorrect format for state (ex.  California)',
            'zip-code-input' => 'Incorrect format for zip code (ex.  90001)',
            'country-input' => 'Incorrect format for country (ex.  United States)',
            'user-avatar' => 'Please upload an image with a maximum size of 700KB and in one of the following formats: jpg or png for your avatar.',
        ];
    }
}
