<?php

namespace App\Http\Requests;

use App\Rules\CheckPrime;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => ['required'],
            'mobile' => ['required', 'max:11'],
            'login_phone' => ['unique:users'],
            'phone_number' => ['regex:/^\d+$/'],

            'profile_picture' => ['image'],
            'documents' => ['mimes:jpg,png'],

            'gender' => ['required_with:first_name,last_name'],
            'sex' => ['required_with_all:first_name,last_name'],

            'code' => ['required',  Rule::in([1, 2, 3])],
            'prime_number' => [new CheckPrime(1)],
        ];
    }
}
