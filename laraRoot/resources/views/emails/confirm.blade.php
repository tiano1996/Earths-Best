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
                      <h2 style=" font-weight: 500;">激活帐号,开始遨游之旅！！(-｡-;)</h2>
                      <p style="line-height: 1.75em;">
                        <a href="{{ url('confirm/confirmation_code',[$token]) }}">点击这里</a>&nbsp;激活帐号。。。<br>
                        如果点不开就把下方链接复制到浏览器打开！<br>
                        {{ url('confirm/confirmation_code',[$token]) }} <br>
                        <br>
                        对了，忘了告诉你，链接{{ config('auth.reminder.expire', 60) }} 分钟内有效 O(∩_∩)O
                        PS：这是一封自动发送的邮件,请不要直接回复
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
