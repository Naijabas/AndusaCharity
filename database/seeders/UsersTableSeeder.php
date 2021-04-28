<?php

use App\Models\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('users')->delete();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $superRole = Role::where('name', 'super')->first();

        // $admin = User::create([
        //     'name' => 'admin user',
        //     'email' => 'admin@danweb.com',
        //     'password' => Hash::make('password'),
        // ]);

        // $admin1 = User::create([
        //     'name' => 'Daniel Ogidan',
        //     'email' => 'hoghidan1@gmail.com',
        //     'password' => Hash::make('english'),
        // ]);


        // $user = User::create([
        //     'name' => 'generic user',
        //     'email' => 'user@danweb.com',
        //     'password' => Hash::make('password'),
        // ]);

        // $user2 = User::create([
        //     'name' => 'user 2',
        //     'email' => 'user2@danweb.com',
        //     'password' => Hash::make('password'),
        // ]);

        // $user1 = User::create([
        //     'name' => 'user 1',
        //     'email' => 'user1@danweb.com',
        //     'password' => Hash::make('password'),
        // ]);


        //  $admin->roles()->attach($adminRole);
        //  $admin1->roles()->attach($adminRole);
        //  $user1->roles()->attach($userRole);
        //  $user2->roles()->attach($userRole);
        //  $user->roles()->attach($userRole);


    }
}
