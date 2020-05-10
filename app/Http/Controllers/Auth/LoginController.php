<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Validation\ValidationException;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm()
    {
        return view('front.auth.login');
    }


    protected function validateLogin(Request $request)
    {



        $message = [

            'password.required' => 'لطفا رمز  عبور را وارد کنید ',
            'email.required' => 'لطفا ایمیل را وارد کنید',

        ];
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',

        ], $message);
    }
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        $user = User::firstOrCreate([
            'name'=>$user->getEmail(),
            'email'=>$user->getName(),
            'provider_id'=>$user->getId(),
        ]);

        Auth::Login($user, true);
        return redirect('https://893ce6f0.ngrok.io/');
    }






    

}
