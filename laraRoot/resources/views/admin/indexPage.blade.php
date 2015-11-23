<!--Main-->
<html xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="/public/md/css/bootstrap.min.css"/>
</head>
<body>
<div class="row  border-bottom white-bg dashboard-header">
    <div class="col-sm-12">
        <blockquote class="text-warning" style="font-size:14px">
            <br>NoBlue后台主题…
            <br>SelfDesign WebKit…
            <br>…………
            <h4 class="text-danger">Now，Its coming！ </h4>

            <h3>hello,{{Auth::getUser()->username}}</h3>

            <h1 style="text-shadow:  4px 3px 0px rgba(0, 0, 0, 0.15);">{{Auth::getUser()->username}}</h1>
        </blockquote>
        <hr>
    </div>
</div>
<div class="row container">
    <div class="col-sm-4">
        <h2>
            No·Blue 后台主题UI框架
        </h2>

        <p>
            <b>当前版本：</b>v1.0
        </p>

        <p>
            <a class="btn btn-success btn-outline"
               href="http://wpa.qq.com/msgrd?v=3&uin=510752553&site=qq&menu=yes" target="_blank">
                <i class="fa fa-qq"> </i> 联系我
            </a>
            <a class="btn btn-white btn-bitbucket" href="http://www.no.me" target="_blank">
                <i class="fa fa-home"></i> 访问博客
            </a>
        </p>
    </div>
    <div class="col-sm-4">
        <h2>Hello, King</h2>
    </div>
    <div class="col-sm-4">
        <div>
            <table class="main">
                <tr>
                    <th>操作系统：</th>
                    <td><?php echo PHP_OS; ?></td>
                </tr>
                <tr>
                    <th>Apache 版本：</th>
                    <td><?php echo apache_get_version(); ?></td>
                </tr>
                <tr>
                    <th>PHP 版本：</th>
                    <td><?php echo phpversion(); ?></td>
                </tr>
                <tr>
                    <th>运行方式：</th>
                    <td><?php echo PHP_SAPI ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>