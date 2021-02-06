<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;


use Closure;

class Hacker
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
              if(Auth::user()->role=='hacker')

              {return $next($request);
                
              }

              elseif(Auth::user()->role=='business')
               {
                  return redirect('/business/dashboard');
              }


              
               elseif(Auth::user()->role=='admin')
               {  
                          return redirect('/index/login');
               }

       
          }
          return redirect('/index/login');
     
          
  }

}
