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
            'name'=>'admin',
            'email'=>'admin@lcc.com.np',
            'password'=>Hash::make('admin@1234')
        );
        DB::table('users')->insert($user);
    }
}
