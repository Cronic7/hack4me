<?php

namespace App\Http\Controllers;


use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class BlogController extends Controller
{
    
    public function showpost()
         {  
         	$search=request()->query('search');
         	 if(request()->query('search'))
         	 {
         	 	$post=Post::where('title','Like',"%{$search}%")->where('status','active')->simplePaginate(4);

         	 }

         	 else
         	 {
         	 	$post=Post::where('status','active')->simplePaginate(4);
         	 }
         	return view('front.post.post')
         	->with('posts',$post)
         	->with('categories',Category::all())
          ->with('randoms',Post::where('status','active')->inRandomOrder()->limit(5)->get());
         }


         public function singlepost(Post $post)
            {
            	return view('front.post.singlepost')
            	->with('post',$post)
            	->with('categories',Category::all());
            }

           public function category(Category $category)
              {

              	

              	 return view('front.post.category')
              	 ->with('category',$category)
              	 ->with('posts',$category->post()->searched()->simplePaginate(4))
                  ->with('categories',Category::all());

              

                  

              }
            
}
