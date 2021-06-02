<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminreg(Administrator $administrator)
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

  }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Models\Administrator  $administrator
//      * @return \Illuminate\Http\Response
//      */

//      public function update(Request $request, Administrator $administrator)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Models\Administrator  $administrator
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(Administrator $administrator)
//     {
//         //
//     }
// }


