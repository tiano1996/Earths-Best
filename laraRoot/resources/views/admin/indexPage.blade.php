<!--Main-->
<html xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="/public/md/css/bootstrap.min.css"/>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, 'Microsoft Yahei', 'Hiragino Sans GB', 'WenQuanYi Micro Hei', sans-serif;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="col-sm-12">
        <h3>
            No·Blue 后台主题UI框架
        </h3>

        <p>
            <b>当前版本：</b>{{ App::version()}}
        </p>
    </div>
    <div class="col-sm-5">
        <blockquote class="text-warning" style="font-size:14px">
            <br>NoBlue 后台主题…
            <br>SelfDesign WebKit…
            <br>…………
            <h4 class="text-danger">Now，Its coming！ </h4>
            hello,<h1 style="text-shadow:  4px 3px 0px rgba(0, 0, 0, 0.15);">{{Auth::getUser()->username}}</h1>
        </blockquote>
        <hr>
    </div>
    <div class="col-sm-7">
        <div class="row">
            <div class="col-sm-4 text-right">
                <span>操作系统：</span>
            </div>
            <div class="col-sm-8">
                {{PHP_OS}}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 text-right">
                <span>PHP 版本：</span>
            </div>
            <div class="col-sm-8">
                {{phpversion()}}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 text-right">
                <span>Apache 版本：</span>
            </div>
            <div class="col-sm-8">
                {{apache_get_version()}}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 text-right">
                <span>运行方式：</span>
            </div>
            <div class="col-sm-8">
                {{PHP_SAPI}}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 text-right">
                <span>运行环境：</span>
            </div>
            <div class="col-sm-8">
                {{ App::environment()}}
            </div>
        </div>
    </div>
</div>
</body>
</html>