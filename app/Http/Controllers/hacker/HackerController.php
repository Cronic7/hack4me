<?php

namespace App\Http\Controllers\hacker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use DB;
use App\UserHacker;
use App\Rating;


class HackerController extends Controller
{
    public function profile()
         {

         	  $email=Auth::user()->email;
         	  
         	  // $data=DB::table('users')->where('name',$user)->first();
         	  // $data = User::with('userhacker')->where('name', $user);
              
              $Total_no_of_prople_rate_me=Rating::where('user_hacker_id',Auth::user()->userhacker->id)->count();

             $rate_array=Rating::where('user_hacker_id',Auth::user()->userhacker->id)->get();
             $total_rate=0;

             foreach($rate_array as $rate_array)
             {
                $total_rate=$total_rate+$rate_array->rate;
             }

             if($Total_no_of_prople_rate_me==0)
             {
               $average_rate=0;
               $unchecked_rate=5;
             }
             else
             {

             $average_rate=intval(round(($total_rate/$Total_no_of_prople_rate_me)));
            
            $unchecked_rate=5-$average_rate;
           }


           $data['checked_rate']=$average_rate;
           $data['unchecked_rate']=$unchecked_rate;
            

            return view('front.hacker.profile',$data)->with('datas',User::where('email',$email)->first());
         }


      public function  update(Request $request , $hacker)
         {
                     
               
                    $id=Auth::user()->id;

                    $pid=DB::table('user_hackers')->where('user_id',$id)->value('id');
                  
                    $user=User::findOrFail($id);
                   $this->validate($request,['file'=>'mimes:jpeg,png,jpg,gif,svg|max:2048',
                                         'username'=>'unique:user_hackers,username,'.$pid
                                           
            ]);
                    

                    if($request->hasFile('file'))

                     {
                       if($user->Userhacker->image)
                       {
                       unlink(public_path().'/profile/hacker/img/'.$user->Userhacker->image);

                       }
                      
                      }

           
           
              $data=$request->only('username','bio');


            if($request->hasFile('file'))
             {  
              $file=$request->file('file');
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('profile/hacker/img/',$filename);
                $data['image']=$filename;

             }
             UserHacker::where('id', $hacker)->update($data);
           // $hacker->update($data);
           // dd($hacker);
       
            session()->flash('success','Profile updated successfully');
            return redirect(route('hacker.profile'));
            

         }
}





 