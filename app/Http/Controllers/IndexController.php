<?php
/**
 * Created by PhpStorm.
 * User: wangtiejun
 * Date: 2019/11/24
 * Time: 21:47
 */

namespace App\Http\Controllers;


use App\Services\BookService;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;

class IndexController extends BaseController
{
    /**
     * @var BookService
     */
    private $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        return view('index.check');
    }

    public function check(Request $request)
    {
        $card_number = $request->input('cardno', 0);
        if ($card_number == 0) {
            return $this->error('service_error', "请输入证件号！");
        }
        $result = $this->bookService->checkByCardNumber($card_number);
        if (!empty($result)) {
            return $this->success($result);
        } else {
            return $this->error('service_error', "没有查到该证书！");
        }
    }

    public function show(Request $request)
    {
        $card_number = $request->input('cardno', 0);
        $result = $this->bookService->getBookByCardNumber($card_number);
        $title = '证书信息';
        $data = compact('result', 'title');
        return view('admin.book.show',$data);
    }
}