<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BountyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



    	  DB::table('bounty_categories')->insert([

    	  	'name'=>'web application',



    	  ]);    

    	DB::table('bounty_categories')->insert([


         'name'=>'desktop application',

    	]) ;     


    	DB::table('bounty_categories')->insert([


         'name'=>'mobile application',

    	]) ;   

        DB::table('bounty_categories')->insert([


         'name'=>'other',

        ]) ;     

    }
}
