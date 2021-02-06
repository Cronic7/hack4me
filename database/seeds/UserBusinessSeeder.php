<?php

use Illuminate\Database\Seeder;
use App\UserBusiness;

class UserBusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['user_id']=3;
        $data['username']="jitu";
        $data['company_name']="ABC";
        $data['telephone']="9807890489";
        $data['address']='sallaghari';
        
      UserBusiness::create($data);
       
    }
}
