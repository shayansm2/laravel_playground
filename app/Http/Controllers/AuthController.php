<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        //
    }

    public function attemptLogin(LoginRequest $request)
    {
        $success = Auth::attempt([
            'username' => $request->input('username_or_email'),
            'password' => $request->input('password')
        ]);
        if (!$success) {
            $success = Auth::attempt([
                'email' => $request->input('username_or_email'),
                'password' => $request->input('password')
            ]);
        }

        return response($success ? __('auth.success') : __('auth.failed'));
    }

    public function showSignupForm()
    {
        //
    }

    public function attemptSignup(SignupRequest $request)
    {
        $user = User::create($request->all());
        $user->password = bcrypt($user->password);
        $user->save();
        Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')]);
    }
}
