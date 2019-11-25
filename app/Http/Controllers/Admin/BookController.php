<?php
/**
 * Created by PhpStorm.
 * User: wangttiejun
 * Date: 2019/11/24
 * Time: 下午7:23
 */

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\BookRequest;
use App\Logs\QALog;
use App\Services\BookService;
use Illuminate\Http\Request;

class BookController extends BaseController
{

    /**
     * 日志文件
     */
    const LOG_FILE = 'crm';

    /**
     * @var BookService
     */
    private $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * 管理员列表页
     * @param BookRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @user tiejun
     * @time 2019/11/24 上午12:23
     */
    public function index(BookRequest $request)
    {
        $requestData             = $request->all();
        $requestData['is_admin'] = 1;
        $result                  = $this->bookService->getBookList($requestData);
        $title                   = '证书列表';
        $data                    = compact('result', 'title', 'requestData');
        return view('admin.book.index', $data);
    }

    /**
     * 新增证书
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @user tiejun
     * @time 2019/11/24 上午12:24
     */
    public function create()
    {
        return view('admin.book.create');
    }

    /**
     * 新增证书
     * @param Request $request
     * @return mixed
     * @user tiejun
     * @time 2019/4/30 下午2:37
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        try {
            $this->bookService->addBook($requestData);
            return $this->success();
        } catch (\Exception $e) {
            $errorData = [
                'errMsg'      => $e->getMessage(),
                'errTrace'    => $e->getTraceAsString(),
                'requestData' => $requestData,
            ];
            QALog::error(__METHOD__, $errorData, self::LOG_FILE);
            return $this->error('service_error', trans('common.service_error'));
        }
    }

    /**
     * 编辑证书
     * @param Request $request
     * @return mixed
     * @user tiejun
     * @time 2019/4/30 下午3:34
     */
    public function edit(Request $request)
    {
        $bookId = $request->input('book_id', 0);
        if (empty($bookId)) {
            return $this->errorBackTo(['error' => trans('common.params_error')]);
        }
        $result = $this->bookService->getBookById($bookId);
        $data = compact('result');
        return view('admin.book.edit',$data);
    }

    public function show(Request $request)
    {
        $bookId = $request->input('book_id', 0);
        if (empty($bookId)) {
            return $this->errorBackTo(['error' => trans('common.params_error')]);
        }
        $result = $this->bookService->getBookById($bookId);
        $data = compact('result');
        return view('admin.book.show',$data);
    }

    /**
     * 编辑证书-提交
     * @param Request $request
     * @return mixed
     * @user tiejun
     * @time 2019/4/30 下午3:48
     */
    public function update(Request $request)
    {
        $requestData = $request->all();
        try {
            $updateData = $requestData;
            unset($updateData['book_id'], $updateData['_token']);
            $this->bookService->updateBookById($updateData, $requestData['book_id']);
            return $this->success();
        } catch (\Exception $e) {
            $errorData = [
                'errMsg'      => $e->getMessage(),
                'errTrace'    => $e->getTraceAsString(),
                'requestData' => $requestData,
            ];
            QALog::error(__METHOD__, $errorData, self::LOG_FILE);
            return $this->error('service_error', trans('common.service_error'));
        }
    }

    /**
     * 删除证书(软删除)
     * @param Request $request
     * @return mixed
     * @user tiejun
     * @time 2019/4/30 下午4:33
     */
    public function destroy(Request $request)
    {
        $bookId = $request->input('book_id', 0);
        if (empty($bookId)) {
            return $this->error('params_error', trans('common.params_error'));
        }
        try {
            $this->bookService->deleteBookById($bookId);
            return $this->success();
        } catch (\Exception $e) {
            $errorData = [
                'errMsg'      => $e->getMessage(),
                'errTrace'    => $e->getTraceAsString(),
                'requestData' => $request->all(),
            ];
            QALog::error(__METHOD__, $errorData, self::LOG_FILE);
            return $this->error('service_error', trans('common.service_error'));
        }
    }
}