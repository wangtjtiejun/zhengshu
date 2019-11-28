<!-- saved from url=(0031)http://jx.sowin.com/code!cer.do -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript" src="{{asset('js/table.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/aes.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/pad-zeropadding-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/public1.js')}}"></script>
    <title></title>
    <link href="{{asset('css/css.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/jquery-ui-1.8.13.custom.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/jqueryUI1.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <style type="text/css">
        .quick_build {
            height: 600px;
            overflow: hidden;
        }

        .quick_build .home_t1 {
            color: #232325;
            font-size: 28px;
            margin: 0 auto;
            padding: 80px 0 0;
            font-weight: 200;
            text-align: center;
            font-family: PingFangSC-Light;
            line-height: 1.1;
        }

        .quick_build1 {
            /* width: 1232px;*/
            margin: 50px auto 65px;
            overflow: hidden;
            text-align: center;
        }

        .quick_build1 .form_control {
            height: 50px;
            width: 400px;
            font-size: 20px;
            font-family: PingFangSC-Light;
            line-height: 1.5;
            display: inline-block;
            background-color: #FFFFFF;
            background-image: none;
            color: #333;
            padding-left: 10px;
            border: 1px solid #e5e6e7;
            font-family: PingFangSC-Light;
        }

        .quick_build1 input.error {
            border: 1px solid #f04134;
        }

        #checkbox-lang {
            height: 30px;
            line-height: 30px;
            text-align: left;
            width: 400px;
            margin: 0 auto;
            font-weight: normal;
            font-size: 12px;
            color: #f04134;
            font-style: italic;
        }

        #checkbox-lang label.error {
            margin: 0;
            line-height: 30px;
            font-weight: normal;
            font-size: 12px;
            color: #f04134;
            font-style: italic;
        }

        .quick_build2 {
            font-size: 20px;
            line-height: 50px;
            margin: 0 auto;
            text-align: center;
            border-radius: 25px;
            color: #fff;
            width: 250px;
            height: 50px;
            cursor: pointer;
        }

        .quick_build2 .dialog-sure {
            background: #3D6EFF;
            font-size: 20px;
            border-radius: 25px;
            color: #fff;
            width: 250px;
            height: 50px;
            cursor: pointer;
            display: block;
            border: 0;
            font-family: PingFangSC-Regular;
        }

        .quick_build2 .dialog-sure:hover {
            background: #648BFF;
            transition: .3s;
        }
    </style>
    <script type="text/javascript" src="{{asset('js/jquery-1.4.4.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.validate.js')}}"></script>
</head>
<body class="forestry-list">
<form id="saveOrUpdate">
    {{csrf_field()}}
    <div class="quick_build">
        <h1 class="home_t1">请输入证件号码</h1>
        <div class="quick_build1">
            <input placeholder="证件号码" type="text" class="form_control" id="idcardnumber" name="idcardnumber">
            <div id="checkbox-lang"></div>
        </div>
        <div class="quick_build2"><input class="dialog-sure" type="submit" value="确认"></div>
    </div>
</form>
<script type="text/javascript">
  $().ready(function () {
    $("#saveOrUpdate").validate({
      errorElement: "label",
      rules: {
        "idcardnumber": {
          required: true
        }
      },
      messages: {
        "idcardnumber": {
          required: "请输入证件号码"
        }
      },
      errorPlacement: function (error, element) {
        if (element.is('#idcardnumber')) {  //如果标签为checkbox
          error.appendTo($("#checkbox-lang"));   //错误增加在id为'checkbox-lang'中
        }
        else {
          error.insertAfter(element);
        }
      },
      submitHandler: function (form) {
        if (clickQr()) {

        }
      }
    });
  });
</script>
<script type="text/javascript">
  function clickQr() {
    $(".dialog-sure").val("查询中...");
    var idcardnumber = $("#idcardnumber").val();
    var _token = $("input[name='_token']").val();
    var data = {
      "cardno": idcardnumber,
      "_token": _token
    }
    $.ajax({
      type: 'post',
      dataType:'json',
      url: "{{route('check')}}",
      data: data,
      success: function (data) {
        if (data.status == 'error') {
          $("#checkbox-lang").html(data.error.message);
          $(".dialog-sure").val("确认");
        } else {
          var card_number = data.data.card_number
          location.href = "/show?cardno=" + card_number
        }
      }
    })
  }
</script>

</body>
</html>