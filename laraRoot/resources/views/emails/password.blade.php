<!DOCTYPE html>
<html lang="zh-hans">
<head>
    <meta charset="utf-8">
</head>
<body>


<table style="width: 100%; background:#eee; font-family: 'Microsoft YaHei';padding-top: 30px;padding-bottom: 50px;">
  <tbody>
    <tr>
      <td align="center">
        <table cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <td>
                <table width="730" cellpadding="0" style="background: #1976d2" cellspacing="0" border="0">
                  <tr>
                    <td style="padding: 15px;">
                      <a href="#" style="display:block;background:url({{URL('/public/img/logo.png')}});background-size: 100%; width: 200px;height: 56px;"></a>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td>
                <table width="730" cellpadding="0" cellspacing="0" border="0" style="background: #fff;">
                  <tr>
                    <td style="padding: 15px;">
                      <p>Hi~! 这里是地球最好项目发来的邮件~</p>
                      <h2 style=" font-weight: 500;">你果然把密码忘了！ 你<small>(gan)</small>是<small>(de)</small>猪<small>(piao)</small>啊<small>(liang)</small>！(-｡-;)</h2>
                      <p style="line-height: 1.75em;">
                        再给你一次机会，<a href="{{ url('/password/reset',[$token]) }}">点击这里</a>&nbsp;重设密码。。。<br>
                        或者你笨的要死就把下方连接复制到浏览器打开！<br>
                        {{ url('/password/reset',[$token]) }} <br>
                        <br>
                        对了，忘了告诉你了，这个链接{{ config('auth.reminder.expire', 60) }} 分钟内有效 O(∩_∩)O
                      </p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>

</body>
</html>
