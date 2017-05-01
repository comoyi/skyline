<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class VerifySession
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
        // 如果没有登录或者登录已失效跳转到登录界面
        if ('/' . Request::path() !== route('login', [], false) && empty(Session::get('id'))) {
            return redirect(route('login'));
        }

        return $next($request);
    }
}
