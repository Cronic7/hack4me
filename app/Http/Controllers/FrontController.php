<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsEmail;
use App\User;
use App\Post;
use App\Bounty;

class FrontController extends Controller
{
    
    public function index()
    {
        $data['hacker']=User::where('role','hacker')->get()->count();
        $data['business']=User::where('role','business')->get()->count();
        $data['post']=Post::all()->count();
        $data['bounty']=Bounty::all()->count();
        
        return view('front.welcome',$data);
    }

    public function contactus()
     {
     	 return view('front.contact');
     }

     public function contactStore()
     {
     	$data=request()->validate([
             'name'=>'required',
             'email'=>'required|email',
             'message'=>'required'

        ]);
        Mail::to('jitbdrrana8@gmail.com')->send(new ContactUsEmail($data));

       
       session()->flash('success' ,'Thank you ,for your valuable feedback keep us supporting!!');
        return redirect()->back();
     }

}
