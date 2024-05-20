<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session()->has('id') ){
            if(session()->get('role') === 'admin'){
                return $next($request);
            }else{
                return back();                
            }
        }
        else{
            return redirect('SignIn');
        }
        
        return $next($request);
    }
}
