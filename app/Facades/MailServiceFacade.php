<?php
/**
 * Created by PhpStorm.
 * User: wangttiejun
 * Date: 2019/11/24
 * Time: 下午1:32
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class MailServiceFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mailservice';
    }

}