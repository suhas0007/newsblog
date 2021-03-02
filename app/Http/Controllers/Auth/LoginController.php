<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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

    public function redirectToProvider()
    {
        return Socialite::driver('google')->with(
        ['client_id' => '340082166231-4c9669g965u0gan2sgqkv71gmvp5p4ll.apps.googleusercontent.com'],
        ['client_secret' => 'MZy2B3wrlknFucBiaBwqJKzu'],
        ['redirect' => 'http://localhost:8000/login/google/callback'])->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $finduser = User::where('email', $user->getEmail())->first();

        if ($finduser) {
            
        Auth::login($finduser);

        }else{

        $newuser = new User;
        $newuser->name = $user->getName();
        $newuser->email = $user->getEmail();
        $newuser->password = bcrypt(123456);
        $newuser->save();
        Auth::login($newuser);

        }

        return redirect('home');

    }

    
}
