<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\ViewErrorBag;

class SignupRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        $viewErrorBag = new ViewErrorBag;
        $viewErrorBag->put('default', $errors);

        request()->session()->put('errors', $viewErrorBag);
    
        $response = response()->withErrors($errors)->json($errors->messages(), 422);
    
        throw new HttpResponseException($response);
    }
}
