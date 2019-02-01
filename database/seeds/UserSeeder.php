<?php

use Illuminate\Database\Seeder;
use Test\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name'=>'houda',
           'email'=>'amel@hotmail.com',
            'password'=>bcrypt('123')

        

                   ]);
    }
}
