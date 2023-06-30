<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        // // Set the redirection based on user's role
        // if (Auth::check()) {
        //     switch (Auth::user()->role) {
        //         case 1:
        //             $this->redirectTo = '/admin/dashboard';
        //             break;
        //         case 2:
        //             $this->redirectTo = '/agency/dashboard';
        //             break;
        //         case 3:
        //             $this->redirectTo = '/developer/dashboard';
        //             break;
        //         case 4:
        //             $this->redirectTo = '/clients/dashboard';
        //             break;
        //         default:
        //             $this->redirectTo = RouteServiceProvider::HOME;
        //     }
        // } else {

        //     $this->redirectTo = RouteServiceProvider::HOME;
        // }
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);
        Console::info('mymessage', $data);
    }

    protected function guard()
    {
        return Auth::guard();
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        
        event(new Registered($user = $this->create($request->all())));
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
        
            if (Auth::check()) {
                if (Auth::user()->role == 1) {
                    return redirect()->intended('/admin/dashboard');
                } else if (Auth::user()->role == 2) {
                    return redirect()->intended('/agency/dashboard');
                } else if (Auth::user()->role == 3) {
                    return redirect()->intended('/developer/dashboard');
                } else if (Auth::user()->role == 4) {
                    return redirect()->intended('/clients/dashboard');
                }
            } else {
    
                // $this->redirectTo = RouteServiceProvider::HOME;
            }
        } else {
            return back()->with('fail', 'Given credentials are not correct');
        }
    }
}
