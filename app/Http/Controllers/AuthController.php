<?php namespace App\Http\Controllers;

use Request;
use Auth;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function doLogin()
    {
        if (Auth::attempt(array('user_name' => Request::input('user_name'),
                                'password'  => Request::input('password')))
        ) {
            return redirect('home');
        }

        return redirect('login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login');
    }
}
