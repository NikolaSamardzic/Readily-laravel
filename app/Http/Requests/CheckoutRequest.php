<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class CheckoutRequest extends FormRequest
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
            'delivery-input' =>  ['required', Rule::exists('delivery_types', 'id'),],
            'address-line-input' => 'required|string|regex:/^[a-zšđžćčA-ZŠĐŽĆČ0-9\s.\-#\/,]+$/',
            'number-input' => 'required|alpha_num:ascii|regex:/^\d+[a-zA-Z]?$/',
            'city-input' => 'required|string|regex:/^([A-ZŠĐŽĆČ][a-zšđžćč]{2,}\s?)+$/',
            'state-input' => 'required|string|regex:/^([A-ZŠĐČĆŽ][a-zšđčćž]{2,}\s?)+$/',
            'zip-code-input' => 'required|alpha_num:ascii|min:5|max:15',
            'country-input' => 'required|string|regex:/^([A-ZŠĐČĆŽ][a-zšđčćž]{2,}\s?)+$/',
        ];
    }
    private function checkCart()
    {
        $cart = json_decode($this->cookie('cart'));
        return empty($cart);
    }


    public function after(): array
    {
        return [
            function (Validator $validator) {
                if ($this->checkCart()) {
                    $validator->errors()->add('cart', 'Cart is empty.');
                }
            }
        ];
    }


    public function messages() : array
    {
        return [
            'delivery-input' => 'Please enter a valid delivery type',
            'address-line-input' => 'Please enter a valid address name.',
            'number-input' => 'Please enter a valid address number.',
            'city-input' => 'Incorrect format for city (ex.  Los Angeles)',
            'state-input' => 'Incorrect format for state (ex.  California)',
            'zip-code-input' => 'Incorrect format for zip code (ex.  90001)',
            'country-input' => 'Incorrect format for country (ex.  United States)',
        ];
    }
}
