<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['email']="jitbdrrana8@gmail.com";
        $data['password']= Hash::make('admin');
        $data['name']="jitu";
        $data['role']='admin';

        User::create($data);

          $data['email']="hacker@gmail.com";
        $data['password']= Hash::make('hacker');
        $data['name']="jitu";
        $data['role']='hacker';

        User::create($data);

          $data['email']="business@gmail.com";
        $data['password']= Hash::make('business');
        $data['name']="jitu";
        $data['role']='business';

        User::create($data);

    }
}
