<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class customAuth
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
           $path=$request->path();
           $session=Session::get('id');
           if($path == 'sign_in' && Session::get('id')){
               return redirect('/');
           }else if($path != 'sign_in' && !Session::get('id')){
            return redirect('sign_in');
        }
        return $next($request);
    }
}
