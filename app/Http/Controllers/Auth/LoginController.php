<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function showlogin(){

    //     return view('auth.login');

    // }
    // public function login(Request $request){

    //       $this->validate($request,[
    //       'email' => 'required|string|email',
    //       'password' => 'required'
    //     ]);

    //     $user = User::where('email', ' = ', $request['email'])
    //     ->where('passsword',' =', Hash::make($request['password']))
    //     ->where('role', '=', 'user');
    //     if($user){
    //         Auth::login($user);
    //         return view('server.dashboard');
    //     }
    //     else{
    //        return redirect()->back();
    //     }

    //     // public function logout(Request $request){

    //     //     Auth::guard('Admin')->logout();
    //     //    return view('/');

    //     }

    }



