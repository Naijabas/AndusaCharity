<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class RegisterController extends Controller
{


    public function adminreg()
    {
        return view('adminreg');
    }

    public function createadmin()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone'=> 'nullable',
            'password' => 'required'
        ]);

        $user = User::create(request(['name', 'email', 'password','phone']));
        $role = Role::where('name', 'SuperAdmin')->first();
        $user->roles()->attach($role->id);
        // return $user;
      //auth()->login($user);

        return redirect()->to('dashboard');
    }


        // public function logout(Request $request){

        //     Auth::guard('Admin')->logout();
        //    return view('/');

        }


