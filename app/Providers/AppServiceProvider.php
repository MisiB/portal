<?php

namespace App\Providers;

use App\Models\administrator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Inertia::share('app.name',config('app.name'));
        Inertia::share('errors',function(){
            return session()->get('errors') ? session()->get('errors')->getBag('default')->getMessages() :(object)[];
        });
        Inertia::share('successMessage',function(){
            return session()->get('successMessage') ? session()->get('successMessage') : null;
        });
        Inertia::share('status',function(){
            return session()->get('status') ? session()->get('status') : null;
        });
        Inertia::share('errorMessage',function(){
            return session()->get('errorMessage') ? session()->get('errorMessage') : null;
        });

        Inertia::share('user',function(Request $request){
            $user ="";
            if(Auth::guard('admin')->check()){
                $user = administrator::with('role.modules.submodules')->whereid(Auth::guard('admin')->User()->id)->first();
                return $user;
            }
            
            if(Auth::check()){
                $user = User::with('role.modules.submodules')->whereid(Auth::User()->id)->first();
                return $user;
            }
           
        });

        Inertia::share('notifications',function(Request $request){
            return $request->user() ? $request->user()->unreadNotifications->count() :[];
        });

        Inertia::share('comments',function(Request $request){
            return $request->user() ?  $request->user()->company ? $request->user()->company->documentcomments :[] :[];
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
