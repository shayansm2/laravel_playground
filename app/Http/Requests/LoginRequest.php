<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\ViewErrorBag;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username_or_email' => 'required',
            'password' => 'required'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        $viewErrorBag = new ViewErrorBag;
        $viewErrorBag->put('default', $errors);

        request()->session()->put('errors', $viewErrorBag);
    
        $response = response()->json($errors->messages(), 422)->withErrors($errors);
    
        throw new HttpResponseException($response);
    }
}
