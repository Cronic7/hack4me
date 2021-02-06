<?php

namespace App\Http\Controllers\hacker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bounty;
use App\BountyCategory;
use Carbon\Carbon;
use App\Report;
use Auth;
use Illuminate\Notifications\Notifiable ;
use App\Notifications\NewReport;
use App\Rating;
use App\User;
class BountyController extends Controller
{
    
         public function show()
         {
                            $currentDate = date('Y-m-d');

                          $bounty=Bounty::whereDate('deadline', '>', $currentDate)
                                                   ->where('status','active')
                                                   ->orderBy('created_at', 'desc')
                                                    ->simplePaginate(4);

                              $my_id=User::where('id',Auth::id())->first();
                              


                                      $my_notification=Rating::where('user_hacker_id',$my_id->userhacker->id)->where('is_seen',0)->count();
                                    $feedback=Rating::where('user_hacker_id',$my_id->userhacker->id)->get();



                                     
         	                       // $data=Bounty::simplePaginate(3);
         	                      return view('front.hacker.event.event')->with('bounties',$bounty)->with('categories',BountyCategory::all())->with('my_notification',$my_notification)->with('feedback',$feedback);
         }

          public function showdetail( $id)
         {  
                                 $currentDate = date('Y-m-d');
                                   $data=Bounty::whereDate('deadline', '>', $currentDate)
                                                   ->where('status','active')
                                                   ->orderBy('created_at', 'desc')
                                                    ->simplePaginate(4);
         	                       $bounty=Bounty::findOrFail($id);
                                  $my_id=User::where('id',Auth::id())->first();
                              


                                      $my_notification=Rating::where('user_hacker_id',$my_id->userhacker->id)->where('is_seen',0)->count();

                                    $feedback=Rating::where('user_hacker_id',$my_id->userhacker->id)->get();

         	                      return view('front.hacker.event.event')->with('bounties',$data)->with('data',$bounty)->with('categories',BountyCategory::all())->with('my_notification',$my_notification)->with('feedback',$feedback);
         }

         public function closedbounty()
          {
              $currentDate = date('Y-m-d');
              $flag="flag to check expire date";

                          $data=Bounty::whereDate('deadline', '<', $currentDate)->simplePaginate(4);

                              $my_id=User::where('id',Auth::id())->first();
                              


                                      $my_notification=Rating::where('user_hacker_id',$my_id->userhacker->id)->where('is_seen',0)->count();
                                  $feedback=Rating::where('user_hacker_id',$my_id->userhacker->id)->get();
                                 // $data=Bounty::simplePaginate(3);
                                return view('front.hacker.event.event')->with('bounties',$data)->with('categories',BountyCategory::all())->with('flag',$flag)->with('my_notification',$my_notification)->with('feedback',$feedback);
          }

         public function showcategorydetail(BountyCategory $category)
           {   $currentDate = date('Y-m-d');
                   $data=Bounty::where('bounty_category_id',$category->id)->where('status','active')->whereDate('deadline', '>', $currentDate)->simplePaginate(3);
                     $my_id=User::where('id',Auth::id())->first();
                              


                                      $my_notification=Rating::where('user_hacker_id',$my_id->userhacker->id)->where('is_seen',0)->count();
                                      $feedback=Rating::where('user_hacker_id',$my_id->userhacker->id)->get();

                return view('front.hacker.event.event')->with('bounties',$data)->with('categories',BountyCategory::all())->with('my_notification',$my_notification)->with('feedback',$feedback);
                         
           }


         public function download($file)
           { 
            
              return response()->download('bounty/file/'.$file);

           }


           public function sendReport()
           { 
            
              $data=request()->validate([
               'account'=>'required|numeric|digits:10',
               'file'=>'mimes:pdf,docx,doc|required|max:10000',
               'message'=>'required',
                  'receiver_business_user_id'=>'',
              ]);

               if(request()->has('file'))
               {
                $file=request()->file('file');
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('report/pdf/',$filename);
                $data['file']=$filename;
               }
               $data['sender_hacker_user_id']=Auth::user()->id;

  
             Report::create($data);

             
             session()->flash('success','Your document has been submitted successfully you will get notification');
             return redirect()->back();


           }

            public function check_read_notification(Request $request)
          {

             $data['is_seen']=1;
             Rating::where('user_hacker_id',$request->id)->update($data);



       
          }





        
}
