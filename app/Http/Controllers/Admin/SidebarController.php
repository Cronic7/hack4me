<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bounty;
use App\Post;
class SidebarController extends Controller
{
  

    public static function activebounty()
         {
         	$currentDate = date('Y-m-d');
             return Bounty::where('status','active')
                               ->whereDate('deadline', '>', $currentDate)
                               ->count();
         }

         public static function closedbounty()
         {
         	$currentDate = date('Y-m-d');
            return Bounty::where('status','active')
                               ->whereDate('deadline', '<', $currentDate)
                               ->count();
         }

         public static function   pendingbounty()
         {
            return Bounty::where('status','pending')->count();
         }




            public static function activepost()
             {
                return Post::where('status','active')->count();
             }

             public static function pendingposts()
             {
                return Post::where('status','pending')->count();
             }

             public static function trashpost()
             {
                return Post::where('status','trash')->count();
             }       
}
