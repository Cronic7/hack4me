<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bounty;
use Auth;

class BountyController extends Controller
{
     
      public function store(Request $request)
         {  
                 
                
               if($request->has('dropdown'))
               { 
               	 $ruleweb=$ruleapk=$ruleexe=$ruledrive='';
               	 $url=$files= $file_names="";
               	 if($request->dropdown=='1' )
               	  {
               	      $ruleweb='regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
               	      $url=$request->website;

               	                     	  }
               	  else if($request->dropdown=='2')
               	  {
               	  	  $ruleexe='required';
               	  	 
               	  }
               	  else if ($request->dropdown=='3')
               	  {
                     $ruleapk='required';
                      

                     
               	  }
               	    else if ($request->dropdown=='4')
               	    {
               	    	$ruledrive='regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?/';
               	    	 $url=$request->drive;
               	    }
               }





         	  $rule=[
         	  	     'website' =>$ruleweb,
                     'title'=>'required',
                     'description'=>'required',
                     'image'=>'mimes:jpeg,png,jpg,gif,svg|max:2048|required',
                     'deadline'=>'required',
                     'dropdown'=>'required',
                     'reward'=>'numeric',
                     'apk'=>$ruleapk,
                      'exe'=>$ruleexe,
                       'drive'=>$ruledrive
         	  ];
         	  $message=[
                    'numeric'=>'Amount must be numeric',
                    'exe.mimes'=>'plz enter exe file',
                    'apk.required'=>'plz enter your apk file ',
                    'apk.mimes'=>'plz enter apk file',
         	  ];
               $this->validate($request,$rule,$message);

             if($request->hasFile('image')) 
             {
            $file = $request->file('image');
            $file_name = time()."_".$file->getClientOriginalName();
            $file_location = public_path('bounty/img');

            $file->move($file_location, $file_name);
               
            
           }
               if($request->apk)
                   {
                   	  
                   	 $files = $request->file('apk');
                     $file_names =$files->getClientOriginalName();
                     $file_location = public_path('bounty/file');

                     $files->move($file_location, $file_names);
                   }
                  elseif($request->exe)
                  { 
                  	$files = $request->file('exe');
                    $file_names =$files->getClientOriginalName();
                     $file_location = public_path('bounty/file');

                     $files->move($file_location, $file_names);
                  }
           	        
                     

          
           Bounty::create([
           	          'title'=>$request->title,
           	          'description'=>$request->description,
           	          'reward'=>$request->reward,
           	          'deadline'=>$request->deadline,
           	          'reward'=>$request->reward,
           	          'bounty_category_id'=>$request->dropdown,
           	          'image'=>$file_name,
           	          'status'=>'pending',
           	          'user_id'=>Auth::user()->id,
           	          'url'=>$url,
           	           'file'=> $file_names,



           ]);

          session()->flash('success','bounty added successfully');
          return redirect(route('business.event'));



         }

}
