<?php

use Illuminate\Database\Seeder;
use App\UserHacker;

class UserHackerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data['address']="Sallaghari";
       $data['username']="hacker";
       $data['user_id']=2;

       UserHacker::create($data);
    }
}
