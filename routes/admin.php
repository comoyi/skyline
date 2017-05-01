<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "admin" middleware group. Enjoy building your admin!
|
*/

// index
Route::get('/', 'IndexController@index')->name('admin.index');

// 登录
Route::get('login', 'LoginController@index')->name('login');
Route::post('login', 'LoginController@login')->name('auth.login');

// 注销
Route::get('logout', 'LoginController@logout')->name('logout');

// 仪表盘
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

// 菜单
Route::get('menus', 'MenuController@index')->name('menus');
Route::get('menus/create', 'MenuController@create')->name('menus.create');
Route::post('menus/store', 'MenuController@store')->name('menus.store');
Route::get('menus/{id}/edit', 'MenuController@edit')->name('menus.edit');
Route::post('menus/{id}/update', 'MenuController@update')->name('menus.update');
Route::post('menus/{id}/destroy', 'MenuController@destroy')->name('menus.destroy');

// 用户组
Route::get('admin-groups', 'AdminGroupController@index')->name('admin-groups');
Route::get('admin-groups/create', 'AdminGroupController@create')->name('admin-groups.create');
Route::post('admin-groups/store', 'AdminGroupController@store')->name('admin-groups.store');
Route::get('admin-groups/{id}/edit', 'AdminGroupController@edit')->name('admin-groups.edit');
Route::post('admin-groups/{id}/update', 'AdminGroupController@update')->name('admin-groups.update');
Route::post('admin-groups/{id}/destroy', 'AdminGroupController@destroy')->name('admin-groups.destroy');

// 用户
Route::get('admin-users', 'AdminUserController@index')->name('admin-users');
Route::get('admin-users/create', 'AdminUserController@create')->name('admin-users.create');
Route::post('admin-users/store', 'AdminUserController@store')->name('admin-users.store');
Route::get('admin-users/{id}/edit', 'AdminUserController@edit')->name('admin-users.edit');
Route::post('admin-users/{id}/update', 'AdminUserController@update')->name('admin-users.update');
Route::post('admin-users/{id}/destroy', 'AdminUserController@destroy')->name('admin-users.destroy');

// 日志
Route::get('logs', 'LogController@index')->name('logs');
Route::get('logs/{id}', 'LogController@show')->name('logs.show');

// 日志类型
Route::get('log/types', 'LogTypeController@index')->name('log.types');
Route::get('log/types/create', 'LogTypeController@create')->name('log.types.create');
Route::post('log/types/store', 'LogTypeController@store')->name('log.types.store');
Route::get('log/types/{id}/edit', 'LogTypeController@edit')->name('log.types.edit');
Route::post('log/types/{id}/update', 'LogTypeController@update')->name('log.types.update');
Route::post('log/types/{id}/destroy', 'LogTypeController@destroy')->name('log.types.destroy');

// 图片管理
Route::get('images', 'ImageController@index')->name('images');
Route::get('images/create', 'ImageController@create')->name('images.create');
Route::post('images/store', 'ImageController@store')->name('images.store');
Route::get('images/{id}', 'ImageController@show')->name('images.show');
Route::get('images/{id}/edit', 'ImageController@edit')->name('images.edit');
Route::post('images/{id}/update', 'ImageController@update')->name('images.update');
Route::post('images/{id}/destroy', 'ImageController@destroy')->name('images.destroy');

// Bug管理
Route::get('bugs', 'BugController@index')->name('bugs');
Route::get('bugs/create', 'BugController@create')->name('bugs.create');
Route::post('bugs/store', 'BugController@store')->name('bugs.store');
Route::get('bugs/{id}', 'BugController@show')->name('bugs.show');
Route::get('bugs/{id}/edit', 'BugController@edit')->name('bugs.edit');
Route::post('bugs/{id}/update', 'BugController@update')->name('bugs.update');
Route::post('bugs/{id}/destroy', 'BugController@destroy')->name('bugs.destroy');

// Role管理
Route::get('roles', 'RoleController@index')->name('roles');
Route::get('roles/create', 'RoleController@create')->name('roles.create');
Route::post('roles/store', 'RoleController@store')->name('roles.store');
Route::get('roles/{id}', 'RoleController@show')->name('roles.show');
Route::get('roles/{id}/edit', 'RoleController@edit')->name('roles.edit');
Route::post('roles/{id}/update', 'RoleController@update')->name('roles.update');
Route::post('roles/{id}/destroy', 'RoleController@destroy')->name('roles.destroy');

// Permission管理
Route::get('permissions', 'PermissionController@index')->name('permissions');
Route::get('permissions/create', 'PermissionController@create')->name('permissions.create');
Route::post('permissions/store', 'PermissionController@store')->name('permissions.store');
Route::get('permissions/{id}', 'PermissionController@show')->name('permissions.show');
Route::get('permissions/{id}/edit', 'PermissionController@edit')->name('permissions.edit');
Route::post('permissions/{id}/update', 'PermissionController@update')->name('permissions.update');
Route::post('permissions/{id}/destroy', 'PermissionController@destroy')->name('permissions.destroy');
