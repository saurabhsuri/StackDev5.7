<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        /*if block says, when you are authenticated in the auth scaffolding's login page, you get 
        redirected to dashboard page i.e. '/home' mentioned in HomeController
        We didn't have and else before, which here means
        if you are not authenticated and directly try to enter dashboard, you get redirected to 
        admin page*/
        /*Basically, AdminController@login authenticates using Auth::attempt()
        if you are authenticated you are sent to dashboard, you can below in the if block change the redirect to dashboard, else, if you directly try or are not authenticated you 
        end up back in admin page.*/
        
        if (Auth::guard($guard)->check()) {
            //return redirect('/home');
            return redirect('admin/dashboard');
        }
        //Only else part is added
        else
        {
            return redirect()->action('AdminController@login')->with('flash_message_error','Login to access');
        }

        return $next($request);
    }
}
