<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
        
     public function __construct()
        {
          $this->middleware('redirectToDashboard')->except('logout');
        }


      public function showloginform()
         {
         	  return view('admin.login');
         }
     public function showsignupform()
         {
         	  return view('admin.register');
         }



       public function login(Request $request)
          {
          	$this->validate($request,[
            'email'   => 'required|email',
            'password' => 'required'
                  ]);
               
            $email=$request->email;  
            $password=$request->password;

            $role = DB::table('users')->where('email',$email)->value('role');

              if (Auth()->attempt(['email' => $request->email, 'password' => $request->password] ))
                     {
                         
                                    if($role=='admin')
                                        {

                                            return redirect('/admin/dashboard');
                                        }
                                          
                                          else
                                        {
                                        	session()->flash('error','Email and pasword didnt match');
                                            return back()->withInput($request->only('email', 'remember')); 

                                        
                                        }
                      }

              
              else
              	     {
                          session()->flash('error','Email and password didnt match');
                          return back()->withInput($request->only('email', 'remember')); 
                      }


          }


       public function signup(Request $request)
         {             $role='admin';
                $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request['password']),
                'role'=>$role
               ]);

         }

       public function logout()
         {
         	Auth::logout();
           return redirect('/admin/show/login');

         }
}
