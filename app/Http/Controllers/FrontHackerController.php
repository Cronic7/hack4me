<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bounty;
use Illuminate\Support\Carbon;
use App\User;
class FrontHackerController extends Controller
{
    public function hackerindex()
    {

    	

    	   
    	  return view('front.front-hacker.index');
    }
}
