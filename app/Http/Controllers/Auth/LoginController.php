<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;
    public function authenticated(Request $request, $user)
    {
    if ($user->hasRole('admin')) {
        return redirect()->route('admin');
    }
    elseif($user->hasRole('userplus')){
        return redirect()->route('home');
    }
    return redirect()->route('home');
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
