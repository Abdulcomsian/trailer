<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            User::truncate();
            // DB::table('roles')->truncate();

            $adminRole = DB::table('roles')->where('name','Admin')->first();
            $userRole = DB::table('roles')->where('name','User')->first();

            $admin = User::create([
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'phone' => '03045433455',
                'password' => Hash::make('password1')
            ]);


            $user = User::create([
                'name' => 'Simple User',
                'email' => 'user@gmail.com',
                'phone' => '03045433451',
                'password' => Hash::make('password1')
            ]);

            
            $admin->assignRole($adminRole->name);
            $user->assignRole($userRole->name);
        }
    }
}
