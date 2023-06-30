<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

  
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function login(Request $request) {
        // Retrieve the login credentials from the request
        $credentials = $request->only('email', 'password');
        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            if(Auth::user()->role ==1 ){
                return redirect()->intended('/admin/dashboard');
            }else if(Auth::user()->role ==2){
                return redirect()->intended('/agency/dashboard');
            }else if(Auth::user()->role ==3){
                return redirect()->intended('/developer/dashboard');
            }else if(Auth::user()->role ==4){
                return redirect()->intended('/clients/dashboard');
            }else{
                $this->guard()->logout();

                $request->session()->invalidate();
        
                $request->session()->regenerateToken();
        
                if ($response = $this->loggedOut($request)) {
                    return $response;
                }
        
                return redirect()->back()->withErrors(['message' => 'Invalid credentials']);
            }
            
        } else {
            // Authentication failed
            // You can handle the failed authentication attempt here
            return redirect()->back()->withErrors(['message' => 'Invalid credentials']);
        }
    }
    

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('/login');
    }
}
