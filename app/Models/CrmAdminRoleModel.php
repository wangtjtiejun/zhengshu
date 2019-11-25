<?php
/**
 * Created by PhpStorm.
 * User: wangttiejun
 * Date: 2019/11/24
 * Time: 下午5:40
 */

namespace App\Models;


class CrmAdminRoleModel extends BaseModel
{
    protected $table = 'crm_admin_role';

    protected $fillable = [
        'name',
        'status'
    ];

    public function rolePermissions()
    {
        return $this->hasMany(CrmAdminRolePermissionModel::class, 'role_id', 'id');
    }

}