<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\AdminGroup;
use App\Models\Admin\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = AdminUser::select([
            'id',
            'group_id',
            'name',
            'email',
            'mobile',
            'phone',
            'sex',
        ])->orderBy('id', 'asc')->get();
        $groups = AdminGroup::select([
            'id',
            'name',
        ])->get();
        return view('admin.admin_user.index', [
            'users' => $users,
            'groups' => $groups,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = AdminGroup::select([
            'id',
            'name',
        ])->get();
        return view('admin.admin_user.create', [
            'groups' => $groups,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new AdminUser();
        $user->group_id = $request->input('group_id');
        $user->username = $request->input('username');
        $user->password = password_hash($request->input('password', ''), PASSWORD_DEFAULT);
        $user->name = $request->input('name', '') ?: '';
        $user->email = $request->input('email', '') ?: '';
        $user->mobile = $request->input('mobile', '') ?: '';
        $user->phone = $request->input('phone', '') ?: '';
        $user->sex = $request->input('sex', 0) ?: 0;
        $user->save();
        return redirect()->route('admin-users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groups = AdminGroup::select([
            'id',
            'name',
        ])->get();
        $user = AdminUser::select([
            'id',
            'group_id',
            'username',
            'name',
            'email',
            'mobile',
            'phone',
            'sex',
        ])->find($id);
        return view('admin.admin_user.edit', [
            'user' => $user,
            'groups' => $groups,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = [
            'group_id' => $request->input('group_id'),
            'name' => $request->input('name') ?: '',
            'email' => $request->input('email') ?: '',
            'mobile' => $request->input('mobile') ?: '',
            'phone' => $request->input('phone') ?: '',
            'sex' => $request->input('sex') ?: 0,
        ];
        if (!empty($request->input('password'))) {
            $user['password'] = password_hash($request->input('password', ''), PASSWORD_DEFAULT);
        }
        AdminUser::where('id', $id)->limit(1)->update($user);
        return redirect()->route('admin-users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdminUser::where('id', $id)->limit(1)->delete();
        return redirect()->route('admin-users');
    }
}
