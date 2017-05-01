<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\AdminGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;

class AdminGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = AdminGroup::select([
            'id',
            'name',
            'status',
        ])->get();
        return view('admin.admin_group.index', [
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
        return view('admin.admin_group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new AdminGroup();
        $group->name = $request->input('name', '');
        $group->save();
        return redirect()->route('admin-groups');
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
        $group = AdminGroup::select([
            'id',
            'name',
            'status',
        ])->find($id);
        return view('admin.admin_group.edit', [
            'group' => $group,
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
        $group = [
            'name' => $request->input('name', ''),
        ];
        AdminGroup::where('id', $id)->limit(1)->update($group);
        return redirect()->route('admin-groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdminGroup::where('id', $id)->limit(1)->delete();
        return redirect()->route('admin-groups');
    }
}
