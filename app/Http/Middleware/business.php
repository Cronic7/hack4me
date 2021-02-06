<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class business
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
              if(Auth::user()->role=='business')

              {return $next($request);
                
              }
            if(Auth::user()->role=='hacker')

              {return redirect('/hacker/dashboard');
                
              }


            
               return redirect('/index/login');

       
          }
     
           else
           {     

               
            
               return redirect('/index/login');

           } 
        return $next($request);
    }
}
