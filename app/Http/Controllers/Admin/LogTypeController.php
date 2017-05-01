<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\LogType;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;

class LogTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logTypes = LogType::select([
            'id',
            'type',
            'description',
        ])->orderBy('id', 'desc')->limit(10)->get();

        return view('admin.log.type.index', [
            'logTypes' => $logTypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.log.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $logType = new LogType();
        $logType->type = $request->input('type');
        $logType->description = $request->input('description');
        $logType->save();
        return redirect()->route('log.types');
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
        $logType = LogType::select([
            'id',
            'type',
            'description',
        ])->find($id);
        return view('admin.log.type.edit', [
            'logType' => $logType,
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
        $logType = [
            'type' => $request->input('type'),
            'description' => $request->input('description'),
        ];
        LogType::where('id', $id)->limit(1)->update($logType);
        return redirect()->route('log.types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LogType::find($id)->limit(1)->delete();
        return redirect()->route('log.types');
    }
}
