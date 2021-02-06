<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User1;
use DB;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('guest')->except('logout');
       
         // $this->middleware('guest:user1')->except('logout');
    }


    public function index()
        {
            return view('front.auth.login');
        }
        

    public function adminLogin(Request $request)
    {

        $this->validate($request,[
            'email'   => 'required|email',
            'password' => 'required'
        ]);
               
             $email=$request->email;  
             $password=$request->password;
             

            $role = DB::table('users')->where('email',$email)->value('role');


            

          if (Auth()->attempt(['email' => $request->email, 'password' => $request->password] ,$request->remember))
          {

             if (Auth::viaRemember()) {
                   dd("kdd");            
            }
            
            if($role=='hacker')
            {

            return redirect('/hacker/dashboard');
            }
            elseif($role=='business')
            {

            
                return redirect('/business/dashboard');
            }
            else {
                  Auth::logout();
                 session()->flash('error','email pasword dont match');
        return back()->withInput($request->only('email', 'remember'));
            }
         }


//         if(auth()->attempt(['email' => $request->email,
//                             'password' => $request->password])){
//             return redirect('hacker/dashboard');
//         }else{
            
//         session()->flash('error','email pasword dont match');
//             return redirect()->back();
// //            return redirect('admin/login');
//         }

         //next method

        //   if(Auth::guard('user1')->attempt($request->only('email','password'))){
        // //Authentication passed...
        //   return redirect()
        //      ->intended(route('hacker.dashboard'))
        //     ->with('status','You are Logged in as Admin!');
        //   }

        session()->flash('error','email pasword dont match');
        return back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
         {
               Auth::logout();
                return redirect('/');
         }
}
