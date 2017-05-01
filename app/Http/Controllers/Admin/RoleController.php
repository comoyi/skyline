<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::select([
            'id',
            'name',
            'display_name',
            'description',
            'created_at',
            'updated_at',
        ])->orderBy('id', 'desc')->get();

        return view('admin.role.index', [
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role();
        $role->name = $request->input('name', '') ?: '';
        $role->display_name = $request->input('display_name', '') ?: '';
        $role->description = $request->input('description', '') ?: '';
        $role->save();
        return redirect()->route('roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::select([
            'id',
            'name',
            'display_name',
            'description',
            'created_at',
            'updated_at',
        ])->find($id);
        return view('admin.role.show', [
            'role' => $role,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::select([
            'id',
            'name',
            'display_name',
            'description',
            'created_at',
            'updated_at',
        ])->find($id);
        return view('admin.role.edit', [
            'role' => $role,
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
        Role::where('id', $id)->limit(1)->update([
            'name' => $request->input('name', '') ?: '',
            'display_name' => $request->input('display_name', '') ?: '',
            'description' => $request->input('description', '') ?: '',
        ]);
        return redirect()->route('roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::where('id', $id)->limit(1)->delete();
        return redirect()->route('roles');
    }
}
