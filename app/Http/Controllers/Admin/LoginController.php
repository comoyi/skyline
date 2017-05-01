<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * index
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.auth.login');
    }

    /**
     * login
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $username = $request->input('username', '');
        $password = $request->input('password', '');

        $user = AdminUser::where('username', '=', $username)->first();

        // 帐号是否存在
        if (empty($user)) {
            return redirect()->route('login');
        }

        // 密码是否正确
        if (!password_verify($password, $user->password)) {
            return redirect(route('login'));
        }

        Session::put('id', $user->id);

        return redirect()->route('dashboard');
    }

    /**
     * 退出
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }

}
