<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Bounty;
use Illuminate\Support\Carbon;

class FrontBusinessController extends Controller
{
    
    public function businessindex()
    {

    	 $today = Bounty::whereDate('created_at', Carbon::today())->paginate(10);
    	 $groupByDaily=$today->countBy('user_id');

    	  $month = Bounty::whereMonth('created_at', Carbon::now()->month)->paginate(10);
    	  $groupByMonth=$month->countBy('user_id');

    	  $year = Bounty::whereYear('created_at', Carbon::now()->year)->paginate(10);
    	  $groupeByYear = $year->countBy('user_id');
        
          
           $yearly_group=[];	
           $monthly_group=[];
           $daily_group=[];
           $i=1;

          foreach ($groupeByYear as $key => $value)
           {
             $yearly_group[$i]["user"]=User::where('id',$key)->first();
             $yearly_group[$i]["count"]=$value;
             $i++;

           }

           $sorted_yearly_group= collect($yearly_group)->sortByDesc('count');
          

          

            $j=1;

          foreach ($groupByMonth as $key => $value)
           {
             $monthly_group[$j]["user"]=User::where('id',$key)->first();
             $monthly_group[$j]["count"]=$value;
             $j++;

           }
           $sorted_monthly_group= collect($monthly_group)->sortByDesc('count');

            $k=1;

          foreach ($groupByDaily as $key => $value)
           {
             $daily_group[$k]["user"]=User::where('id',$key)->first();
             $daily_group[$k]["count"]=$value;
             $k++;

           }
           $sorted_daily_group= collect($daily_group)->sortByDesc('count');

           $data['totalcount']=Bounty::all()->count();
           $data['yearly_group']=$sorted_yearly_group;
           $data['monthly_group']=$sorted_monthly_group;
           $data['daily_group']=$sorted_daily_group;
          

    	   
    	  return view('front.front-business.index',$data);
    }
}
