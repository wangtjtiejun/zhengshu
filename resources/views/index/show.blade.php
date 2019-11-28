<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0064)http://jx.sowin.com/code!detail.do?id_s=xsfvEIfFTo29pwhwUTA6EQ== -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>证书信息</title>
    <link href="{{asset("css/screen.css")}}" rel="stylesheet" type="text/css" media="screen">
    <script type="text/javascript">
      function CreateQRCode(element, data, w, h) {
        var qrcode = new QRCode(element, {
          text: data,
          width: w,
          height: h,
          colorLight: "rgba(0, 0, 0, 0)",
          correctLevel: QRCode.CorrectLevel.L
        });
      }
    </script>
</head>
<body style="background-color:#daecf6;">
<table width="500" border="1" align="center" cellpadding="8" bgcolor="#FFFFFF" bordercolor="#999999" style="font-family: Microsoft YaHei, Verdana, Arial, Helvetica, sans-serif; font-size:14px;">
    <tbody>
    <tr>
        <td width="200" align="right">姓名：</td>
        <td>{{$result['name']}}</td>
    </tr>
    <tr>
        <td align="right">性别：</td>
        <td>{{$result["sex"]}}</td>
    </tr>
    <tr>
        <td align="right">出生日期：</td>
        <td>{{$result["birthday"]}}</td>
    </tr>
    <tr>
        <td align="right">证书编号：</td>
        <td>{{$result["card_number"]}}</td>
    </tr>
    <tr>
        <td align="right">身份证号：</td>
        <td>{{$result["id_card"]}}</td>
    </tr>
    <tr>
        <td align="right">职业（工种）及等级：</td>
        <td>{{$result["grade_work"]}}</td>
    </tr>
    <tr>
        <td align="right">理论知识考试成绩：</td>
        <td>
            {{$result["llzs_score"]}}
        </td>
    </tr>
    <tr>
        <td align="right">操作技能考核成绩：</td>
        <td>
            {{$result["czjn_score"]}}
        </td>
    </tr>
    <tr>
        <td align="right">评定成绩：</td>
        <td>{{$result["results"]}}</td>
    </tr>
    <tr>
        <td align="right">颁证日期：</td>
        <td>{{$result["card_date"]}}</td>
    </tr>
    <tr>
        <td align="right">发证单位：</td>
        <td>
            {{$result["company"]}}
        </td>
    </tr>
    <tr>
        <td align="right">证书流水码所属号段：</td>
        <td>
			<span>
			      <b>{{$result["paragraph_number"]}} </b>
			</span>
            <br>
            &nbsp;
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>