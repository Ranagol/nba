<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    public function login(){
        
        if (!auth()->attempt(//pokusaj autentikaciju sa podacima iz requesta sto je poslato iz forme
            request(['email', 'password'])
        )) {// i ako imamo ne-poklapanje sa podacima iz db, vracaj gresku
            return back()->withErrors([
                'message' => 'Bad credentials. Please try again.'
            ]);
        }
        return redirect('/');//...a ako nema greske i autentikacija je uspesna salji usera na /

    }

    public function logout(){
        auth()->logout();//ovo su built in funkcije, 
        return redirect('/login');
    }

}
