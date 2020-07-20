<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('admins')->insert([
        	'name'      => 'TungBS',
        	'email'     => 'buisontung1997@gmail.com',
        	'phone'	    => '0337857855',
        	'password'	=> Hash::make('123456789')
        ]);
    }
}
