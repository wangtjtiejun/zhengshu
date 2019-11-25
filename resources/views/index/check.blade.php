@extends('admin.layout.iframe_main')

@section('content')
<article class="page-container">
    <form class="form form-horizontal" id="form-book-add">
        {{csrf_field()}}

        <div class="row cl" style="zoom: 1.6;text-align:center;">
            <div class="formControls col-xs-8 col-sm-4" style="width: 100%;text-align:center;font-weight:bold;">
                请输入证件号码
            </div>
        </div>
        <div class="row cl" style="margin-top: 25px;">
            <div class="formControls col-xs-8 col-sm-4" style="width: 100%;text-align:center;">
                <input type="number" class="input-text radius" value="" placeholder="证件号码" id="cardno" name="cardno" style="width:300px;">
            </div>
        </div>
        <div class="row cl" style="margin-top: 45px;">
            <div class="formControls col-xs-8 col-sm-4" style="width: 100%;text-align:center;"">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;确定&nbsp;&nbsp;" style="background-color: #05f;width: 200px;border-radius: 15px; ">
            </div>
        </div>
    </form>
</article>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('H-ui-admin/lib/jquery.validation/1.14.0/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('H-ui-admin/lib/jquery.validation/1.14.0/validate-methods.js')}}"></script>
    <script type="text/javascript" src="{{asset('H-ui-admin/lib/jquery.validation/1.14.0/messages_zh.js')}}"></script>
    <script type="text/javascript">
        $(function(){
            $("#form-book-add").validate({
                onkeyup:false,
                focusCleanup:true,
                success:"valid",
                submitHandler:function(form){
                    $(form).ajaxSubmit({
                        type: 'post',
                        dataType:'json',
                        url: "{{route('check')}}" ,
                        success: function(data){
                            console.log(data);
                            if (data.status == 'error') {
                                layer.msg(data.error.message, {icon: 2, time: 1500});
                                return false;
                            }
                            // layer.msg('查询成功!',{icon:1,time:1000});
                            var card_number = data.data.card_number
                            window.parent.location.href = "/show?cardno=" + card_number
                            // window.parent.location.reload();
                            // return true;
                        }
                    });
                }
            });
        });
    </script>
@endsection