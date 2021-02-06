<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
              DB::table('bounties')->insert([
            'title' =>'Urgent find bugs in my website',
            'description'=>'this is the part of site and your responsibility is to find bugs in our site and in return we will reward handsome price',
            'bounty_category_id'=>'1',
            
            'deadline'=>'2020-04-16 12:00:21',
            'user_id'=>3,
            'created_at'=>'2020-04-16 12:00:21',
            'updated_at'=>'2020-04-16 12:00:21',
            'reward'=>'500',
             'status'=>'active'


             
        ]);



         
              DB::table('bounties')->insert([
            'title' =>'get bug and take reward',
            'description'=>'this is the part of site and your responsibility is to find bugs in our site and in return we will reward handsome price',
            'bounty_category_id'=>'2',
            
            'deadline'=>'2020-04-16 12:00:21',
            'user_id'=>3,
            'created_at'=>'2020-04-16 12:00:21',
            'updated_at'=>'2020-04-16 12:00:21',
            'reward'=>'900',                 
            'status'=>'active'


             
        ]);
               DB::table('bounties')->insert([
            'title' =>'make your time and search some bugs ',
            'description'=>'this is the part of site and your responsibility is to find bugs in our site and in return we will reward handsome price',
            'bounty_category_id'=>'2',
          
            'deadline'=>'2020-04-16 12:00:21',
            'user_id'=>3,
            'created_at'=>'2020-04-16 12:00:21',
            'updated_at'=>'2020-04-16 12:00:21',
            'reward'=>'500',
            'status'=>'active'


             
        ]);
                DB::table('bounties')->insert([
            'title' =>'get bug and take reward',
            'description'=>'this is the part of site and your responsibility is to find bugs in our site and in return we will reward handsome price',
            'bounty_category_id'=>'2',
           
            'deadline'=>'2020-04-16 12:00:21',
            'user_id'=>3,
            'created_at'=>'2020-04-16 12:00:21',
            'updated_at'=>'2020-04-16 12:00:21',
            'reward'=>'456',
            'status'=>'active'

             
        ]);




    }
}
