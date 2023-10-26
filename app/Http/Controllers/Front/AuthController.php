<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\SigninRequest;
use App\Http\Requests\Front\SignupRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function signinForm()
    {
        return view('front.auth.signin-form');
    }

    public function signinAction(SigninRequest $signinRequest)
    {
        if (auth('web')->attempt($signinRequest->validated())) {
            return redirect(route('admin.home'));
        }

        return redirect(route('auth.signin'))
            ->withErrors(['email' => 'Incorrect sign in data!']);
    }

    public function signupForm()
    {
        return view('front.auth.signup-form');
    }

    public function signupAction(SignupRequest $signupRequest)
    {
        $data = $signupRequest->validated();
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        if ($user) {
            auth('web')->login($user);
        }

        return redirect(route('admin.home'));
    }

    public function signout()
    {
        auth('web')->logout();

        return redirect(route('home'));
    }
}
