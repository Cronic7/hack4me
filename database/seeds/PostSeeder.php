<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('posts')->insert([
                    'title'=>'Covid 19 information',
                    'image'=>'1587721492_bg.jpg',
                    'description'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum ",


                    'published_at'=>"2020-04-21 12:00:00",
                    'content'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",

                    'image'=>"1587721492_bg.jpg",
                    'user_id'=>2,
                    'category_id'=>1, 
                    'status'=>'active'             
       
          ]);

          DB::table('posts')->insert([
                    'title'=>'Ethical hacking in neapal',
                    'image'=>'1587721492_bg.jpg',
                    'description'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum ",
                    

                    'published_at'=>"2020-04-21 12:00:00",
                    'content'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                    'image'=>"1587721492_bg.jpg",
                    'user_id'=>2,
                    'category_id'=>1, 
                    'status'=>'active'             
       
          ]);
          

          DB::table('posts')->insert([
                    'title'=>'current IT situation in neapal',
                    'image'=>'1587721492_bg.jpg',
                    'description'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum",


                    'published_at'=>"2020-04-21 12:00:00",

                    'content'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",

                    'image'=>"1587721517_bg1.jpg",
                    'user_id'=>2,
                    'category_id'=>1, 
                    'status'=>'active'             
       
          ]);

          
          DB::table('posts')->insert([
                    'title'=>'Hackthon',
                    'image'=>'1587721492_bg.jpg',
                    'description'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum ",

                    'published_at'=>"2020-04-21 12:00:00",

                    'content'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",

                    'image'=>"1587721517_bg1.jpg",
                    'user_id'=>2,
                    'category_id'=>1, 
                    'status'=>'active'             
       
          ]);
         

          DB::table('posts')->insert([
                    'title'=>'Current industrial revolution',
                    'image'=>'1587721492_bg.jpg',
                    'description'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum ",


                    'published_at'=>"2020-04-21 12:00:00",

                    'content'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",

                    'image'=>"1587721688_white2.jpeg",
                    'user_id'=>2,
                    'category_id'=>1, 
                    'status'=>'pending'             
       
          ]);


          DB::table('posts')->insert([
                    'title'=>'Moderan technology and equipment',
                    'image'=>'1587721492_bg.jpg',
                    'description'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum ",


                    'published_at'=>"2020-04-21 12:00:00",

                    'content'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",

                    'image'=>"1587721723_hack.jpg",
                    'user_id'=>2,
                    'category_id'=>1, 
                    'status'=>'pending'             
       
          ]);



    }
}
