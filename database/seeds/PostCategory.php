<?php

use Illuminate\Database\Seeder;
use App\Category;

class PostCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['name']="covid_19";
        Category::create($data);
         $data['name']="Laravel";
        Category::create($data);
         $data['name']="php";
        Category::create($data);
         $data['name']="other";
        Category::create($data);
    }
}
