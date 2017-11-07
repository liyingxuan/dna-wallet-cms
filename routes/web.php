<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * 后台管理 : 首页 | 用户管理 | 菜单管理 | 角色管理 | 权限管理
 */
Route::group(['namespace' => 'Backend', 'middleware' => ['auth', 'Entrust']], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);
});

Route::group([], function () {
    Auth::routes();
});

Route::group(['namespace' => 'Business', 'middleware' => ['auth', 'Entrust']], function () {
    Route::resource('intelligence', 'IntelligenceController');
});
