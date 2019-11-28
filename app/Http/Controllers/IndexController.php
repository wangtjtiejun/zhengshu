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

    public function index(Request $request)
    {
        $request->session()->put("code",'code');
        $title = '国家职业资格证书管理系统';
        $data = compact('title');
        return view('index.index', $data);
    }

    public function code(Request $request)
    {
        if (!$request->session()->get("code")) {
            return view('index.error');
        }
        return view('index.code');
    }

    public function check(Request $request)
    {
        $card_number = $request->input('cardno', 0);
        if ($card_number == 0) {
            return $this->error('service_error', "请输入正确证件号码");
        }
        $result = $this->bookService->checkByCardNumber($card_number);
        if (!empty($result)) {
            return $this->success($result);
        } else {
            return $this->error('service_error', "没有该证书");
        }
    }

    public function show(Request $request)
    {
        if (!$request->session()->get("code")) {
            return view('index.error');
        }
        $card_number = $request->input('cardno', 0);
        $result = $this->bookService->getBookByCardNumber($card_number);
        $title = '证书信息';
        $data = compact('result', 'title');
        return view('index.show',$data);
    }
}