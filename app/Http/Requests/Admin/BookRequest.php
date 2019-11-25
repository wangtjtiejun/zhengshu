<?php
/**
 * Created by PhpStorm.
 * User: wangttiejun
 * Date: 2019/4/30
 * Time: 下午1:33
 */

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string',
            'card_number' => 'nullable|integer',
            'page' => 'nullable|integer',
            'pageCount' => 'nullable|integer',
        ];
    }

//    /**
//     * Get the validation message that apply to the request
//     *
//     * @return array
//     */
//    public function messages()
//    {
//        return []
//    }
}