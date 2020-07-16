<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PhoneNumber;

class StoreContact extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            'firstname' => ['required','unique:contacts','max:255'],
            'address' => ['required'],
            'email' => ['required','unique:contacts','email'],
            'phone' =>['required', 'unique:contacts', new PhoneNumber],
        ];
    }
}
