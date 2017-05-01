<?php

namespace App\Http\Middleware\Admin;

use App\Models\Admin\Log;
use App\Models\Admin\AdminUser;
use App\Models\Admin\Menu;
use Closure;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use stdClass;

class AdminData
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

        if ('/' . Request::path() === route('login', [], false)) {
            return $next($request);
        }

        $sys = new StdClass();

        $sys->version = '0.0.1';

        $sys->projectName = 'Skyline';

        $sys->projectShortName = 'skyline';

        $sys->pageHeader = 'Page header';

        $sys->pageHeaderDescription = 'Optional description';

        $dateTime = date('Y-m-d H:i:s');
        $sys->dateTime = $dateTime;

        $menuData = Menu::orderBy('priority', 'desc')->select([
            'id',
            'pid',
            'name',
            'uri',
            'icon',
        ])->get()->toArray();

        foreach ($menuData as &$v) {
            foreach ($menuData as &$v2) {
                if ($v2['pid'] == $v['id']) {
                    $v['child'][] = &$v2;
                }
            }
            unset($v2);
        }
        unset($v);

        foreach ($menuData as $k => $v) {
            if ($v['pid'] != 0) {
                unset($menuData[$k]);
            }
        }

        $sys->systemMenus = $menuData;

        $userId = Session::get('id');
        $sys->user = AdminUser::findOrFail($userId);

        // add log
        $log = new Log();
        $log->user_id = $userId;
        $log->ip = ip2long(Request::ip());
        $log->detail = Request::path();
        $log->save();

        View::share('sys', $sys);

        return $next($request);
    }
}
