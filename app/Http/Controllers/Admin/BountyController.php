<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bounty;

class BountyController extends Controller
{
    

      public function showactivebunty()
        {     $currentDate = date('Y-m-d');
        	 $data=Bounty::where('status','active')
                          ->whereDate('deadline', '>', $currentDate)
                          ->paginate(9);
        	  return view('admin.bounty.active-bounty')->with('activebounties',$data);
        }

        public function showexpiredbunty()
        {   
             $currentDate = date('Y-m-d');
             $data=Bounty::where('status','active')
                           ->whereDate('deadline', '<', $currentDate)
                           ->paginate(9);
              return view('admin.bounty.closed-bounty')->with('activebounties',$data);
        }

        public function showpendingbunty()
        {
        	 $data=Bounty::where('status','pending')->paginate(9);
        	  return view('admin.bounty.pending-bounty')->with('activebounties',$data);
        }

        public function approve(Bounty $bounty)
        { 

            $bounty->status='active';
            $bounty->save();
             session()->flash('success','Bounty has been successfuly appeoved');
            return redirect()->back();

        }

        public function massdelete(Request $request)
        { 
            $this->validate($request,[
              'del'=>'required'
            ]);

            $id=$request->del;
            Bounty::whereIn('id',$id)->delete();

            session()->flash('success','multiple Deleted  successfully');
            return redirect()->back();
        

        }

        public function singledelete(Bounty $id)
         {
                $id->delete();
                session()->flash('success','Deleted successfully');
                return redirect()->back();

         }

        
}
