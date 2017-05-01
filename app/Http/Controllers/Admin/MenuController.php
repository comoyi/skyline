<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::select([
            'id',
            'pid',
            'name',
            'uri',
            'icon',
            'priority',
        ])->orderBy('priority', 'desc')->get();
        return view('admin.menu.index', [
            'menus' => $menus,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::select([
            'id',
            'pid',
            'name',
            'uri',
            'icon',
            'priority',
        ])->get();
        $routes = app()->routes->getRoutes();
        return view('admin.menu.create', [
            'menus' => $menus,
            'routes' => $routes,
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
        $menu = new Menu();
        $menu->pid = $request->input('pid');
        $menu->name = $request->input('name');
        $menu->uri = $request->input('uri', '') ?: '';
        $menu->icon = $request->input('icon', '') ?: '';
        $menu->priority = $request->input('priority', 0) ?: 0;
        $menu->save();
        return redirect()->route('menus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menus = Menu::select([
            'id',
            'pid',
            'name',
            'uri',
            'icon',
            'priority',
        ])->get();
        $menu = Menu::select([
            'id',
            'pid',
            'name',
            'uri',
            'icon',
            'priority',
        ])->find($id);
        $routes = app()->routes->getRoutes();
        return view('admin.menu.edit', [
            'menus' => $menus,
            'menu' => $menu,
            'routes' => $routes,
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
        $menu = [
            'pid' => $request->input('pid'),
            'name' => $request->input('name'),
            'uri' => $request->input('uri', '') ?: '',
            'icon' => $request->input('icon', '') ?: '',
            'priority' => $request->input('priority', 0) ?: 0,
        ];
        Menu::where('id', $id)->limit(1)->update($menu);
        return redirect()->route('menus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // 有子节点不能删除
        if (!empty(Menu::where('pid', $id))) {
            return redirect()->back();
        }

        Menu::where('id', $id)->limit(1)->delete();
        return redirect()->route('menus');
    }
}
