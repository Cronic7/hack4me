<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\BountyCategory;
use App\Report;
use Auth;
use App\Rating;
use Alert;

class EventController extends Controller
{
     public function show()
           {
           	   $data['hackers']=User::where('role','hacker')->paginate(5);
           	   $data['categories']=BountyCategory::all();
              $data['reports']=Report::where('receiver_business_user_id',Auth::user()->id)->get();
              $data['count_notification']=Report::where('receiver_business_user_id',Auth::user()->id)
                                                 ->where('is_seen',0)
                                                 ->count();


           	  return view('front.business.event.event',$data);
           	         
           	         
           }

       public function showhackerprofile($id)
          {
                $data['hackers']=User::findOrFail($id);

                $Total_no_of_prople_rate_me=Rating::where('user_hacker_id', $data['hackers']->userhacker->id)->count();

               $rate_array=Rating::where('user_hacker_id',$data['hackers']->userhacker->id)->get();
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
          
                  return view('front.business.profile',$data);

          }

          public function check_read_notification(Request $request)
          {
             $data['is_seen']=1;
             Report::where('receiver_business_user_id',$request->id)->update($data);



       
          }

          public function showReportDetails($id)
          {
              $data['hackers']=User::where('role','hacker')->paginate(5);
              $data['categories']=BountyCategory::all();
              $data['reports']=Report::where('receiver_business_user_id',Auth::user()->id)->get();
              $data['count_notification']=Report::where('receiver_business_user_id',Auth::user()->id)
                                                 ->where('is_seen',0)
                                                 ->count();
              $data['reports_detail']=Report::where('id',$id)->first();
              $read['is_read']=1;
              Report::where('id',$id)->update($read);
             
              $data['flag']=1;
              $data['checK_if_feedback_and_rating_already']=Rating::where('report_id',$id)->count();


              return view('front.business.event.event',$data);

          }

          public function deletereport($id)
          {
             Report::where('id',$id)->delete();
             session()->flash('success','Notification has been deleted success fully');
             return redirect()->back();
          }

          public function deleteMassreport(Request $request)
          { 
            $this->validate($request,[
               'report_id'=>'required',
            ]);
            $report_id=$request->report_id;
            $count=count($report_id);

                Report::whereIn('id',$report_id)->delete();
              session()->flash('success',$count.' Notification has been deleted success fully');
             return redirect()->back();
           
         
          }
          public function RatingStore(Request $request)
          {

          
           Rating::create([
                 'user_hacker_id'=>$request->hacker_id,
                 'user_business_id'=>$request->user_id,
                 'report_id'=>$request->report_id,
                 'rate'=>$request->rate,
                 'message'=>$request->message,

           ]);


              
           Alert::success('Thak you', 'Your feedback and rating has done succesfully');


          }
          public function CheckIfAlready(Request $request)
          {
             
             $ratecheck=Rating::where('report_id',$request->report_id)->count();
             if($ratecheck==0)
             {
              $status='true';
              return response()->JSON($status);
             }
             else
             {
               $status='false';
              return response()->JSON($status);
             }
          }
     

}
