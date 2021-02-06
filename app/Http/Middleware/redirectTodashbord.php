<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class redirectTodashbord
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
         if(Auth::check())

         {

            if(Auth::user()->role=="admin")
                 {    

                    
                   return redirect(route('admin.dashboard'));
                 }

         }



            return $next($request);
      
   }
}
