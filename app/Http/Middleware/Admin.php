<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
                if(Auth::user()->role=='admin')
                      {  

                         return $next($request);
                      }
                 elseif(Auth::user()->role=='business')
                      {  
                        
                        return redirect(route('admin.show.login'));
                      }
                    elseif(Auth::user()->role=='hacker')
                      {  

                        return redirect(route('admin.show.login'));
                      }
            }

        


         return redirect(route('admin.show.login'));

    }
}
