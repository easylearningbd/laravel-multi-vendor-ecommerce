<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use App\Models\User;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {

        if (Auth::check()) {
           $expireTime = Carbon::now()->addSeconds(30);
           Cache::put('user-is-online' . Auth::user()->id, true,$expireTime);
           User::where('id',Auth::user()->id)->update(['last_seen' => Carbon::now()]);
        }



        if ($request->user()->role !== $role) {
           return redirect('dashboard');
        }


        return $next($request);
    }
}
 