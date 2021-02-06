<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BountyController extends Controller
{
       
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.hacker.event');
    }



// this part is for sidebar in admin side
     
 
}
