<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

class checkpermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $permissions = $request->user()->role->permissions;
        if(count($permissions)>0){
            $route = Route::currentRouteName();
            $found = false;
             foreach ($permissions as $key => $value) {
                 if($value->value===$route){
                    $found = true;
                 }
             }
             if($found){
                return $next($request);
             }else{
                 return redirect()->back()->with('errorMessage','Not Permitted to access resource');
             }
           
        }
       
    }
}
