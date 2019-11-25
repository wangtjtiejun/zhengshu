<?php
/**
 * Created by PhpStorm.
 * User: wangttiejun
 * Date: 2019/11/24
 * Time: 上午11:57
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class LogFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'qalog';
    }

}