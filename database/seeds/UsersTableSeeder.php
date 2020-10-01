<?php

use Illuminate\Database\Seeder;
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
        $user=array(
            array(
                'name'=>'Super Admin',
                'email'=>'superadmin@lcc.com.np',
                'role' => 'superadmin',
                'password'=>Hash::make('supperp@ssw0rd')
            ),
            array(
                'name'=>'Admin',
                'email'=>'admin@lcc.com.np',
                'role' => 'admin',
                'password'=>Hash::make('adminpassword')
            ),
            array(
                'name'=>'User',
                'email'=>'user@lcc.com.np',
                'role' => 'user',
                'password'=>Hash::make('password')
            ),
           
        );
        DB::table('users')->insert($user);
    }
}
