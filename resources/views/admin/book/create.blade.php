@extends('admin.layout.iframe_main')

@section('content')
<article class="page-container">
    <form class="form form-horizontal" id="form-book-add">
        {{csrf_field()}}
        <div class="row cl">
            <label for="name" class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>姓名：</label>
            <div class="formControls col-xs-8 col-sm-4">
                <input type="text" class="input-text radius" value="" placeholder="" id="name" name="name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">性别：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="radio-box" style="padding-left: 0px;">
                    <input type="radio" id="sex-1" name="sex" value="男" checked>
                    <label for="sex-1">男</label>
                </div>
                <div class="radio-box" style="padding-left: 0px;">
                    <input type="radio" id="sex-2" name="sex" value="女" >
                    <label for="sex-2">女</label>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label for="birthday" class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>出生日期：</label>
            <div class="formControls col-xs-8 col-sm-4">
                <input type="date" class="input-text radius" placeholder="" name="birthday" id="birthday">
            </div>
        </div>
        <div class="row cl">
            <label for="card_number" class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>证书编号：</label>
            <div class="formControls col-xs-8 col-sm-4">
                <input type="number" class="input-text radius" value="" placeholder="" id="card_number" name="card_number" style="width:200px;">
            </div>
        </div>
        <div class="row cl">
            <label for="id_card" class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>身份证号：</label>
            <div class="formControls col-xs-8 col-sm-4">
                <input type="text" class="input-text radius" value="" placeholder="" id="id_card" name="id_card">
            </div>
        </div>
        <div class="row cl">
            <label for="grade_work" class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>职业（工种）及等级：</label>
            <div class="formControls col-xs-8 col-sm-4">
                <input type="text" class="input-text radius" value="" placeholder="" id="grade_work" name="grade_work">
            </div>
        </div>
        <div class="row cl">
            <label for="llzs_score" class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>理论知识考试成绩：</label>
            <div class="formControls col-xs-8 col-sm-4">
                <input type="text" class="input-text radius" value="" placeholder="" id="llzs_score" name="llzs_score" >
            </div>
        </div>
        <div class="row cl">
            <label for="czjn_score" class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>操作技能考核成绩：</label>
            <div class="formControls col-xs-8 col-sm-4">
                <input type="text" class="input-text radius" value="" placeholder="" id="czjn_score" name="czjn_score" >
            </div>
        </div>
        <div class="row cl">
            <label for="results" class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>评定成绩：</label>
            <div class="formControls col-xs-8 col-sm-4">
                <input type="text" class="input-text radius" value="" placeholder="" id="results" name="results">
            </div>
        </div>
        <div class="row cl">
            <label for="card_date" class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>颁证日期：</label>
            <div class="formControls col-xs-8 col-sm-4">
                <input type="date" class="input-text radius" value="" placeholder="" id="card_date" name="card_date">
            </div>
        </div>
        <div class="row cl">
            <label for="company" class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>发证单位：</label>
            <div class="formControls col-xs-8 col-sm-4">
                <input type="text" class="input-text radius" value="" placeholder="" id="company" name="company">
            </div>
        </div>
        <div class="row cl">
            <label for="paragraph_number" class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>证书流水码所属号段：</label>
            <div class="formControls col-xs-8 col-sm-4">
                <input type="text" class="input-text radius" value="" placeholder="" id="paragraph_number" name="paragraph_number">
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
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
                rules:{
                    name:{
                        required:true
                    },
                    sex:{
                        required:true
                    },
                    birthday:{
                        required:true
                    },
                    card_number:{
                        required:true
                    },
                    id_card:{
                        required:true
                    },
                    grade_work:{
                        required:true
                    },
                    llzs_score:{
                        required:true
                    },
                    czjn_score:{
                        required:true
                    },
                    results:{
                        required:true
                    },
                    card_date:{
                        required:true
                    },
                    company:{
                        required:true
                    },
                    paragraph_number:{
                        required:true
                    }
                },
                onkeyup:false,
                focusCleanup:true,
                success:"valid",
                submitHandler:function(form){
                    $(form).ajaxSubmit({
                        type: 'post',
                        dataType:'json',
                        url: "{{route('book.store')}}" ,
                        success: function(data){
                            console.log(data);
                            if (data.status == 'error') {
                                layer.msg(data.error.message, {icon: 2, time: 1500});
                                return false;
                            }
                            layer.msg('添加成功!',{icon:1,time:1000});
                            window.parent.location.reload();
                            return true;
                        }
                    });
                }
            });
        });
    </script>
@endsection