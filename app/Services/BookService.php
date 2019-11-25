<?php
/**
 * Created by PhpStorm.
 * User: wangttiejun
 * Date: 2019/4/30
 * Time: 上午10:48
 */

namespace App\Services;


use App\Models\CrmBookModel;

class BookService
{
    /**
     * 证书列表
     * @param array $data
     * @return mixed
     * @user tiejun
     * @time 2019/4/30 下午1:06
     */
    public function getBookList(array $data)
    {
        $page          = $data['page'] ?? 1;
        $pageCount     = $data['pageCount'] ?? config('crm.pageCount');
        $result        = CrmBookModel::query();
        if (!empty($data['name'])) {
            $result->where('name', 'like', $data['name'] . '%');
        }
        if (!empty($data['card_number'])) {
            $result->where('card_number', 'like', $data['card_number'] . '%');
        }
        $result->orderBy('created_at','desc');
        if(!empty($data['is_admin'])){
            $result = $result->paginate($pageCount);
            return $result;
        }
        $totalCount = $result->count();
        $rows = $result->offset(($page - 1) * $pageCount)
            ->limit($pageCount)
            ->get();
        $return = formatPage($rows, $totalCount, $page, $pageCount);
        return $return;
    }

    /**
     * 新增证书
     * @param array $data
     * @return $this|\Illuminate\Database\Eloquent\Model
     * @user tiejun
     * @time 2019/4/30 下午2:25
     */
    public function addBook(array $data)
    {
        $addData = [
            'name' => $data['name'] ?? '',
            'sex'    => $data['sex'] ?? '',
            'birthday'    => $data['birthday'] ?? '',
            'card_number' => $data['card_number'] ?? '',
            'id_card' => $data['id_card'] ?? '',
            'card_number' => $data['card_number'] ?? '',
            'grade_work' => $data['grade_work'] ?? '',
            'llzs_score' => $data['llzs_score'] ?? '',
            'czjn_score' => $data['czjn_score'] ?? '',
            'results' => $data['results'] ?? '',
            'card_date' => $data['card_date'] ?? '',
            'company' => $data['company'] ?? '',
            'paragraph_number' => $data['paragraph_number'] ?? '',
            'status'   => 1
        ];

        return CrmBookModel::query()->create($addData);
    }

    /**
     * getBookById
     * @param int $userId
     * @return array
     * @user tiejun
     * @time 2019/4/30 下午3:22
     */
    public function getBookById(int $userId): array
    {
        $result = CrmBookModel::query()
            ->where('id', '=', $userId)
            ->first();
        if (empty($result)) {
            return [];
        }
        $detail = [
            'id'        => $result->id,
            'name'  => $result->name,
            'sex'     => $result->sex,
            'birthday'     => $result->birthday,
            'card_number'    => $result->card_number,
            'id_card'   => $result->id_card,
            'card_number'  => $result->card_number,
            'grade_work'     => $result->grade_work,
            'llzs_score'     => $result->llzs_score,
            'czjn_score'    => $result->czjn_score,
            'results'   => $result->results,
            'card_date'  => $result->card_date,
            'company'     => $result->company,
            'paragraph_number'     => $result->paragraph_number
        ];
        return $detail;
    }

    /**
     * checkByCardNumber
     * @param int $cardNumber
     * @return array
     * @user tiejun
     * @time 2019/11/24 下午3:22
     */
    public function checkByCardNumber(int $cardNumber): array
    {
        $result = CrmBookModel::query()
            ->where('card_number', '=', $cardNumber)
            ->first();
        if (empty($result)) {
            return [];
        }
        $detail = [
            'card_number'    => $result->card_number
        ];
        return $detail;
    }

    /**
     * getBookByCardNumber
     * @param int $cardNumber
     * @return array
     * @user tiejun
     * @time 2019/11/24 下午3:22
     */
    public function getBookByCardNumber(int $cardNumber): array
    {
        $result = CrmBookModel::query()
            ->where('card_number', '=', $cardNumber)
            ->first();
        if (empty($result)) {
            return [];
        }
        $detail = [
            'id'        => $result->id,
            'name'  => $result->name,
            'sex'     => $result->sex,
            'birthday'     => $result->birthday?date("Y 年 m 月 d 日",strtotime($result->birthday)):'',
            'card_number'    => $result->card_number,
            'id_card'   => $result->id_card,
            'card_number'  => $result->card_number,
            'grade_work'     => $result->grade_work,
            'llzs_score'     => $result->llzs_score,
            'czjn_score'    => $result->czjn_score,
            'results'   => $result->results,
            'card_date'  => $result->card_date,
            'company'     => $result->company,
            'paragraph_number'     => $result->paragraph_number
        ];
        return $detail;
    }

    /**
     * updateUserById
     * @param array $data
     * @param int $bookId
     * @return int
     * @user tiejun
     * @time 2019/4/30 下午3:51
     */
    public function updateBookById(array $data, int $bookId)
    {
        return CrmBookModel::query()
            ->where('id', '=', $bookId)
            ->update($data);
    }

    /**
     * deleteUserById
     * @param $id
     * @return int
     * @user tiejun
     * @time 2019/4/30 下午4:32
     */
    public function deleteBookById($id)
    {
        return CrmBookModel::destroy($id);
    }

    /**
     * 通用根据条件查询返回单个用户信息
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object|static
     * @user tiejun
     * @time 2019/11/24 下午5:36
     */
    public function getUserByCond(array $data = [])
    {
        $result = CrmBookModel::query();
        if ($data['email']) {
            $result->where('email', '=', $data['email']);
        }
        $result = $result->first();
        return $result;
    }
}