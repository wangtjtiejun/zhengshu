<?php
/**
 * Created by PhpStorm.
 * User: wangttiejun
 * Date: 2019/11/24
 * Time: 下午7:23
 */

namespace App\Http\Controllers\Admin;


class AuthController extends BaseController
{
    public function login()
    {
        return view('auth.login');
    }
}