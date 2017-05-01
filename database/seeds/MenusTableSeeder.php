<?php

use App\Models\Admin\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'name' => '系统',
                'uri' => '',
                'icon' => 'fa fa-cog',
                'priority' => 0,
                'child' => [
                    [
                        'name' => '仪表盘',
                        'uri' => 'admin/dashboard',
                        'icon' => 'fa fa-dashboard',
                        'priority' => 0,
                        'child' => [

                        ],
                    ],
                    [
                        'name' => '菜单管理',
                        'uri' => '',
                        'icon' => 'fa fa-list',
                        'priority' => 0,
                        'child' => [
                            [
                                'name' => '菜单列表',
                                'uri' => 'admin/menus',
                                'icon' => 'fa fa-book',
                                'priority' => 0,
                                'child' => [

                                ],
                            ],
                            [
                                'name' => '添加菜单',
                                'uri' => 'admin/menus/create',
                                'icon' => 'fa fa-plus',
                                'priority' => 0,
                                'child' => [

                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => '用户管理',
                        'uri' => '',
                        'icon' => 'fa fa-user',
                        'priority' => 0,
                        'child' => [
                            [
                                'name' => '用户列表',
                                'uri' => 'admin/admin-users',
                                'icon' => 'fa fa-users',
                                'priority' => 0,
                                'child' => [

                                ],
                            ],
                            [
                                'name' => '添加用户',
                                'uri' => 'admin/admin-users/create',
                                'icon' => 'fa fa-user-plus',
                                'priority' => 0,
                                'child' => [

                                ],
                            ],
                            [
                                'name' => '组管理',
                                'uri' => 'admin/admin-groups',
                                'icon' => 'fa fa-users',
                                'priority' => 0,
                                'child' => [

                                ],
                            ],
                            [
                                'name' => '添加组',
                                'uri' => 'admin/admin-groups/create',
                                'icon' => 'fa fa-plus',
                                'priority' => 0,
                                'child' => [

                                ],
                            ],
                            [
                                'name' => '角色管理',
                                'uri' => 'admin/roles',
                                'icon' => 'fa fa-user',
                                'priority' => 0,
                                'child' => [

                                ],
                            ],
                            [
                                'name' => '权限管理',
                                'uri' => 'admin/roles',
                                'icon' => 'fa fa-unlock-alt',
                                'priority' => 0,
                                'child' => [

                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => '日志',
                        'uri' => '',
                        'icon' => 'fa fa-history',
                        'priority' => 0,
                        'child' => [
                            [
                                'name' => '日志首页',
                                'uri' => 'admin/logs',
                                'icon' => '',
                                'priority' => 0,
                                'child' => [

                                ],
                            ],
                            [
                                'name' => '日志类型',
                                'uri' => 'admin/log/types',
                                'icon' => '',
                                'priority' => 0,
                                'child' => [

                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => '业务',
                'uri' => '',
                'icon' => 'fa fa-folder-open',
                'priority' => 0,
                'child' => [
                    [
                        'name' => 'Banner',
                        'uri' => '',
                        'icon' => 'fa fa-newspaper-o',
                        'priority' => 0,
                        'child' => [

                        ],
                    ],
                    [
                        'name' => '数据统计',
                        'uri' => '',
                        'icon' => 'fa fa-line-chart',
                        'priority' => 0,
                        'child' => [
                            [
                                'name' => '登录统计',
                                'uri' => '',
                                'icon' => '',
                                'priority' => 0,
                                'child' => [

                                ],
                            ],
                            [
                                'name' => '注册统计',
                                'uri' => '',
                                'icon' => '',
                                'priority' => 0,
                                'child' => [

                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => '图片管理',
                        'uri' => '',
                        'icon' => 'fa fa-picture-o',
                        'priority' => 0,
                        'child' => [
                            [
                                'name' => '图片首页',
                                'uri' => 'admin/images',
                                'icon' => '',
                                'priority' => 0,
                                'child' => [

                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => '公告',
                        'uri' => '',
                        'icon' => 'fa fa-volume-up',
                        'priority' => 0,
                        'child' => [

                        ],
                    ],
                    [
                        'name' => 'App版本更新',
                        'uri' => '',
                        'icon' => 'fa fa-chevron-circle-up',
                        'priority' => 0,
                        'child' => [
                            [
                                'name' => 'ios版本更新',
                                'uri' => '',
                                'icon' => 'fa fa-apple',
                                'priority' => 0,
                                'child' => [

                                ],
                            ],
                            [
                                'name' => 'android版本更新',
                                'uri' => '',
                                'icon' => 'fa fa-android',
                                'priority' => 0,
                                'child' => [

                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => '开发',
                'uri' => '',
                'icon' => 'fa fa-code-fork',
                'priority' => 0,
                'child' => [
                    [
                        'name' => '需求',
                        'uri' => '',
                        'icon' => 'fa fa-leaf',
                        'priority' => 0,
                        'child' => [

                        ],
                    ],
                ],
            ],
        ];

        $this->add($menus);
    }

    /**
     * 添加菜单
     *
     * @param $menus
     * @param int $pid
     */
    protected function add($menus, $pid = 0)
    {
        foreach ($menus as $m) {
            $menu = new Menu();
            $menu->pid = $pid;
            $menu->name = $m['name'];
            $menu->uri = $m['uri'];
            $menu->icon = $m['icon'];
            $menu->priority = $m['priority'];
            $menu->save();
            if (isset($m['child']) && !empty($m['child'])) {
                $this->add($m['child'], $menu->id);
            }
        }
    }
}
