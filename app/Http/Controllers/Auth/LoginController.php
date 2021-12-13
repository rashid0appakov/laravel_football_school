<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

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

    protected function authenticated(Request $request, $user)
    {
        $user = Auth::user();
        if ($user->hasRole('Родитель')) {
            return redirect('/parents');
        } else if($user->hasRole('Администратор')) {
            return redirect('/admin');
        } else if($user->hasRole('Тренер')) {
            return redirect('/trainer');
        } else if($user->hasRole('Менеджер')) {
            return redirect('/manager');
        }

    }


    public function showLoginForm()
    {
        $clubs = Club::get();
        return view('auth/login', compact('clubs'));
    }
}
