<?php
/**
 * Created by PhpStorm.
 * User: wangttiejun
 * Date: 2019/11/24
 * Time: 下午5:40
 */

namespace App\Models;


class CrmAdminRolePermissionModel extends BaseModel
{
    protected $table = 'crm_admin_role_permission';

    protected $fillable = [
        'role_id',
        'permission_id',
    ];

    public function permission(){
        return $this->hasOne(CrmAdminPermissionModel::class,'id','permission_id');
    }

}