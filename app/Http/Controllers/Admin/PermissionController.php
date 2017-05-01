<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::select([
            'id',
            'name',
            'display_name',
            'description',
            'created_at',
            'updated_at',
        ])->orderBy('id', 'desc')->get();

        return view('admin.permission.index', [
            'permissions' => $permissions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission = new Permission();
        $permission->name = $request->input('name', '') ?: '';
        $permission->display_name = $request->input('display_name', '') ?: '';
        $permission->description = $request->input('description', '') ?: '';
        $permission->save();
        return redirect()->route('permissions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::select([
            'id',
            'name',
            'display_name',
            'description',
            'created_at',
            'updated_at',
        ])->find($id);
        return view('admin.permission.show', [
            'permission' => $permission,
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
        $permission = Permission::select([
            'id',
            'name',
            'display_name',
            'description',
            'created_at',
            'updated_at',
        ])->find($id);
        return view('admin.permission.edit', [
            'permission' => $permission,
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
        Permission::where('id', $id)->limit(1)->update([
            'name' => $request->input('name', '') ?: '',
            'display_name' => $request->input('display_name', '') ?: '',
            'description' => $request->input('description', '') ?: '',
        ]);
        return redirect()->route('permissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::where('id', $id)->limit(1)->delete();
        return redirect()->route('permissions');
    }
}
