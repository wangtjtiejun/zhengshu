<?php
/**
 * Created by PhpStorm.
 * User: wangttiejun
 * Date: 2019/11/24
 * Time: 下午6:05
 */

namespace App\Http\Controllers\Admin;


use App\Services\PermissionService;

class MenuController extends BaseController
{
    public function __construct()
    {

    }

    public function index()
    {
        $menu = PermissionService::getMenu();
        $data = compact('menu');
        return view('admin.layout.sidebar', $data);
    }
}