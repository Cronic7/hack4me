<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\User1;
use App\UserHacker;
use App\UserBusiness;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\CreateHackerRequest;
use App\Http\Requests\CreateBusinessRequest;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        // $this->middleware('guest:user1');
            
    }

       public function index()
        {
            return view('front.auth.signup');
        }
 

     protected function createHacker(CreateHackerRequest $request)
    {  
        $role='hacker';
        $user = User::create([
            'name' => $request->Hname,
            'email' => $request->Hemail,
            'password' =>Hash::make($request['Hpassword']),
            'role'=>$role
         ]);

        $user_id = $user->id;
        $password=Hash::make($request['Hpassword']);


      

           UserHacker::create([

                            'address'=>$request->Haddress,
                             'username'=>$request->HUsername,
                             'user_id'=>$user_id,
                           
        ]);

           if(Auth()->attempt(['email' => $request->Hemail, 'password'=>$request->Hpassword] ));
           {  
             return redirect('/hacker/dashboard');

           }
           
      }

        protected function createBusiness(CreateBusinessRequest $request)
       {
       
        $role='business';
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'role'=>$role
        ]);

        $user_id = $user->id;

          UserBusiness::create([

                             'username'=>$request->username,
                              'company_name'=>$request->company_name,
                              'user_id'=>$user_id,
                              'address'=>$request->location,
                              'telephone'=>$request->telephone
        ]);

          if(Auth()->attempt(['email' => $request->email, 'password'=>$request->password] ));
           {  
             return redirect('/business/dashboard');

           }
   
      }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role'=>'hacker'
        ]);
    }


   
}
