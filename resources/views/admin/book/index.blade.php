@extends('admin.layout.iframe_main')

@section('content')
    <nav class="breadcrumb">
        <i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en">&gt;</span> 证书管理
        <span class="c-gray en">&gt;</span> 证书列表
        <a class="btn btn-success radius r refresh-btn" style="line-height:1.6em;margin-top:3px" title="刷新">
            <i class="Hui-iconfont">&#xe68f;</i>
        </a>
    </nav>
    <div class="page-container">
        <div class="text-l">
            <form method="GET" action="{{route('book.lists')}}">
                <p style="display: inline-block;" class="search_p">
                    <span>姓名</span>
                    <input type="text" class="input-text radius" value="{{$requestData['name'] ?? ''}} " style="width:200px" placeholder="输入姓名" id="" name="name">
                </p>
                <p style="display: inline-block" class="search_p">
                    <span></span>
                    <input type="text" class="input-text radius" value="{{$requestData['id_card'] ?? ''}}" style="width:200px" placeholder="输入身份证号" id="" name="id_card" >
                </p>
                <button type="submit" class="btn btn-success radius"><i class="Hui-iconfont">&#xe665;</i> 查询
                </button>
            </form>
        </div>

        <div class="cl pd-5 bg-1 bk-gray mt-20">
            <span class="l">
                <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
                    <i class="Hui-iconfont">&#xe6e2;</i>
                    批量删除
                </a>
                <a href="javascript:;" onclick="admin_add('添加证书','{{route('book.create')}}',800,500)"class="btn btn-primary radius">
                    <i class="Hui-iconfont">&#xe600;</i>
                    添加证书
                </a>
            </span>
        </div>
        <table class="table table-border table-bordered table-bg  table-hover radius">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="50">姓名</th>
                <th width="50">性别</th>
                <th width="100">证书编号</th>
                <th width="100">身份证号</th>
                <th width="120">职业（工种）及等级</th>
                <th width="100">理论知识考试成绩</th>
                <th width="100">操作技能考核成绩</th>
                <th width="100">评定成绩</th>
                <th width="100">颁证日期</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            @forelse($result as $row)
                <tr class="text-c">
                    <td><input type="checkbox" value="{{$row->id}}" name="ids"></td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->sex}}</td>
                    <td>{{$row->card_number}}</td>
                    <td>{{$row->id_card}}</td>
                    <td>{{$row->grade_work}}</td>
                    <td>{{$row->llzs_score}}</td>
                    <td>{{$row->czjn_score}}</td>
                    <td>{{$row->results}}</td>
                    <td>{{$row->card_date}}</td>
                    <td class="td-manage">
                        <a title="预览" href="javascript:;" onclick="book_show('预览','{{route('book.show',['book_id' => $row->id])}}','800','500')" class="ml-5" style="text-decoration:none">
                            <span class="label label-success radius"> 预览 </span>
                        </a>
                        <a title="编辑" href="javascript:;" onclick="admin_edit('证书编辑','{{route('book.edit',['book_id' => $row->id])}}','800','500')" class="ml-5" style="text-decoration:none">
                            <i class="Hui-iconfont">&#xe6df;</i>
                        </a>
                        <a title="删除" href="javascript:;" onclick="admin_del(this,'{{$row->id}}')" class="ml-5"
                           style="text-decoration:none">
                            <i class="Hui-iconfont">&#xe6e2;</i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" style="text-align: center;color: red">无数据</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{$result->appends($requestData)->links()}}
    </div>
@endsection
@section('script')
    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="{{asset('H-ui-admin/lib/My97DatePicker/4.8/WdatePicker.js')}}"></script>
    <script type="text/javascript"
            src="{{asset('H-ui-admin/lib/datatables/1.10.0/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('H-ui-admin/lib/laypage/1.2/laypage.js')}}"></script>
    <script type="text/javascript">
        /*
            参数解释：
            title	标题
            url		请求的url
            id		需要操作的数据id
            w		弹出层宽度（缺省调默认值）
            h		弹出层高度（缺省调默认值）
        */
        /*证书-增加*/
        function admin_add(title, url, w, h) {
            layer_show(title, url, w, h);
        }

        /**
         * 证书-预览
         */
        function book_show(title, url, w, h) {
          layer_show(title, url, w, h);
        }

        /*证书-删除*/
        function admin_del(obj, id) {
            layer.confirm('确认要删除吗？', function (index) {
                $.ajax({
                    type: 'POST',
                    url: '{{route('book.destroy')}}',
                    data: {
                        'book_id': id
                    },
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        if (data.status == 'error') {
                            layer.msg(data.error.message, {icon: 2, time: 1500});
                            return false;
                        }
                        $(obj).parents("tr").remove();
                        layer.msg('已删除!', {icon: 1, time: 1000});
                    }
                });
            });
        }

        // 批量删除
        function datadel() {
            var id_arr = new Array();
            $('input:checkbox[name=ids]:checked').each(function (i) {
                id_arr[i] = $(this).val();
            });
            if (id_arr.length === 0) {
                layer.msg('未选中数据', {icon: 2, time: 1500});
                return false;
            }
            layer.confirm('确认要删除吗？', function () {
                $.ajax({
                    type: 'POST',
                    url: '{{route('book.destroy')}}',
                    data: {
                        'book_id': id_arr
                    },
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        if (data.status == 'error') {
                            layer.msg(data.error.message, {icon: 2, time: 1500});
                            return false;
                        }
                        layer.msg('已删除!', {icon: 1, time: 1000});
                        location.reload();
                    }
                });
            });
        }

        /*证书-编辑*/
        function admin_edit(title, url, w, h) {
            layer_show(title, url, w, h);
        }

        /*证书-停用*/
        function admin_stop(obj, id) {
            layer.confirm('确认要停用吗？', function (index) {
                //此处请求后台程序，下方是成功后的前台处理……
                update_status(id, 0);
                layer.msg('已停用!', {icon: 5, time: 1000});
                location.reload();
            });
        }

        /*证书-启用*/
        function admin_start(obj, id) {
            layer.confirm('确认要启用吗？', function (index) {
                //此处请求后台程序，下方是成功后的前台处理……
                update_status(id, 1);
                console.log(id);
                layer.msg('已启用!', {icon: 6, time: 1000});
                location.reload();
            });
        }

        /* 修改状态 */
        function update_status(id, status) {
            $.ajax({
                url: "{{route('book.update')}}",
                data: {
                    'book_id': id,
                    'status': status
                },
                dataType: 'json',
                type: 'post',
                success: function (data) {
                    console.log(data);
                    if (data.status == 'error') {
                        layer.msg(data.error.message, {icon: 2, time: 1500});
                        return false;
                    }
                }
            });
        }
    </script>
@endsection