<?php

namespace App\Http\Controllers\business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use DB;
use App\Userbusiness;


class BusinessController extends Controller
{
    public function profile()
         {

         	  $email=Auth::user()->email;
         	  
         	  // $data=DB::table('users')->where('name',$user)->first();
         	  // $data = User::with('userbusiness')->where('name', $user);
            return view('front.business.profile')->with('datas',User::where('email',$email)->first());
         }


      public function  update(Request $request , $business)
         {
                  
                  
                    $id=Auth::user()->id;
                    $pid=DB::table('user_businesses')->where('user_id',$id)->value('id');
                  
                    $user=User::findOrFail($id);
                   $this->validate($request,['image'=>'mimes:jpeg,png,jpg,gif,svg|max:2048',
                                         'username'=>'unique:user_hackers|unique:user_businesses,username,'.$pid,

                                           
            ]);
                    
                    if($request->hasFile('image'))

                     {
                       if($user->Userbusiness->image)
                       {
                       unlink(public_path().'/profile/business/img/'.$user->Userbusiness->image);

                       }
                      
                      }

           
           
              $data=$request->only('username','bio','company_name','address');


            if($request->hasFile('image'))
             {   $file=$request->file('image');
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('profile/business/img/',$filename);
                $data['image']=$filename;

             }
             Userbusiness::where('id', $business)->update($data);
           // $business->update($data);
           // dd($business);
            session()->flash('success','Profile updated successfully');
            return redirect(route('business.profile'));
            

         }
}
