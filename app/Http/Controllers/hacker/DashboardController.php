<?php

namespace App\Http\Controllers\hacker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
     public function hackerindex()
           {
             return view('front.hacker.dashbord');

           }
}
