<?php

namespace App\Http\Controllers\hacker;
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
         	return view('front.hacker.post')
         	->with('posts',$post)
         	->with('categories',Category::all());
         }


         public function singlepost(Post $post)
            {
            	return view('front.hacker.post.singlepost')
            	->with('post',$post)
            	->with('categories',Category::all());
            }

           public function category(Category $category)
              {

              	

              	 return view('front.hacker.post.category')
              	 ->with('category',$category)
              	 ->with('posts',$category->post()->searched()->simplePaginate(4))
                  ->with('categories',Category::all());

              

                  

              }
}
