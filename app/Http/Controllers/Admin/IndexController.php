<?php
/**
 * Created by PhpStorm.
 * User: wangttiejun
 * Date: 2019/11/24
 * Time: 下午1:17
 */

namespace App\Http\Controllers\Admin;


class IndexController extends BaseController
{
    public function index()
    {
        return view('admin.index');
    }
}