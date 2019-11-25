@extends('admin.layout.iframe_main')

@section('content')
    <style type="text/css">
        body{
            background-color: rgba(135,206,255,0.2);
        }
        .page-container {
            padding-left: 14px;
            padding-right: 18px;
        }
        .show_left {
            text-align: right !important;
            font-size: 10px;
            width: 44%;
        }
        .show_right {
            font-size: 10px;
            /*font-weight:bold;*/
            width: 56%;
        }
        table {
            background-color: #fff;
            border-spacing: 2px;
        }
        .table th, .table td {
            padding: 3px;
            line-height: 20px;
        }
        .table-bordered td {
            border: 1px solid #ddd;
        }
        .page-container {
            padding: 10px;
        }
    </style>
    <article class="page-container">
        <table class="table table-border table-bordered table-bg  table-hover radius" border="8">
            <tbody>
                <tr>
                    <td class="show_left">姓名：</td>
                    <td class="show_right">{{$result['name']}}</td>
                </tr>
                <tr>
                    <td class="show_left">性别：</td>
                    <td class="show_right">{{$result["sex"]}}</td>
                </tr>
                <tr>
                    <td class="show_left">出生日期：</td>
                    <td class="show_right">{{$result["birthday"]}}</td>
                </tr>
                <tr>
                    <td class="show_left">证书编号：</td>
                    <td class="show_right">{{$result["card_number"]}}</td>
                </tr>
                <tr>
                    <td class="show_left">身份证号：</td>
                    <td class="show_right">{{$result["id_card"]}}</td>
                </tr>
                <tr>
                    <td class="show_left">职业（工种）及等级：</td>
                    <td class="show_right">{{$result["grade_work"]}}</td>
                </tr>
                <tr>
                    <td class="show_left">理论知识考试成绩：</td>
                    <td class="show_right">{{$result["llzs_score"]}}</td>
                </tr>
                <tr>
                    <td class="show_left">操作技能考核成绩：</td>
                    <td class="show_right">{{$result["czjn_score"]}}</td>
                </tr>
                <tr>
                    <td class="show_left">评定成绩：</td>
                    <td class="show_right">{{$result["results"]}}</td>
                </tr>
                <tr>
                    <td class="show_left">颁证日期：</td>
                    <td class="show_right">{{$result["card_date"]}}</td>
                </tr>
                <tr>
                    <td class="show_left">发证单位：</td>
                    <td class="show_right">{{$result["company"]}}</td>
                </tr>
                <tr>
                    <td class="show_left">证书流水码所属号段：</td>
                    <td class="show_right" style="font-size: 8px;font-weight:bold;">{{$result["paragraph_number"]}}</td>
                </tr>
            </tbody>
        </table>
    </article>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('H-ui-admin/lib/jquery.validation/1.14.0/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('H-ui-admin/lib/jquery.validation/1.14.0/validate-methods.js')}}"></script>
    <script type="text/javascript" src="{{asset('H-ui-admin/lib/jquery.validation/1.14.0/messages_zh.js')}}"></script>
@endsection