<?php
/**
 * Created by PhpStorm.
 * User: wangttiejun
 * Date: 2019/4/29
 * Time: 下午2:01
 */

namespace App\Models;

use Illuminate\Notifications\Notifiable;

class CrmBookModel extends BaseModel
{
    use Notifiable;

    protected $rememberTokenName = '';

    protected $table = 'crm_book';

    protected $fillable = [
        'name',
        'sex',
        'birthday',
        'card_number',
        'id_card',
        'grade_work',
        'llzs_score',
        'czjn_score',
        'results',
        'card_date',
        'company',
        'paragraph_number'
    ];

    /**
     * 需要被转换成日期的属性。
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}