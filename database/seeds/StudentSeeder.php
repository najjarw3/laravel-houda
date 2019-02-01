<?php

use Illuminate\Database\Seeder;
use Test\Student;

class StudentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         Student::create([
                   'name'=>"houda",

                   'classroom_id'=>6,

        

                   ]);


         Student::create([
                   'name'=>"noura",

                   'classroom_id'=>7,

        

                   ]);


         Student::create([
                   'name'=>"amel",

                   'classroom_id'=>6,

        

                   ]);
    }
}
