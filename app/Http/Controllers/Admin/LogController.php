<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Log;
use App\Http\Controllers\Admin\Controller;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = Log::select([
            'id',
            'log_type_id',
            'user_id',
            'ip',
            'detail',
            'created_at',
        ])->orderBy('id', 'desc')->paginate(10);

        return view('admin.log.index', [
            'logs' => $logs,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $log = Log::select([
            'id',
            'log_type_id',
            'user_id',
            'ip',
            'created_at',
            'detail',
        ])->find($id);
        return view('admin.log.show', [
            'log' => $log,
        ]);
    }
}
