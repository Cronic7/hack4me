<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GalleryCategory;
use App\GalleryImage;

class GalleryController extends Controller
{
     public function showgallerycategory()
       {
       	 return view('front.gallery.gallery-category')->with('categories',GalleryCategory::all());
       }

       public function  showgallerycategoryimage($slug)
        {   $category=GalleryCategory::where('slug',$slug)->first();

                 
           $image=GalleryImage::where('gallery_category_id',$category->id)->get();
        
        	
        	return view('front.gallery.image')->with('category',$category)->with('images',$image);
        }
}
