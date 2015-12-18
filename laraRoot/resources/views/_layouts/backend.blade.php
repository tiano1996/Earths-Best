<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="description" content="管理后台">
    <meta name="author" content="popohum,tino1996">
    <title>@yield('title')后台首页</title>
    <link rel="stylesheet" type="text/css" href="/public/md/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/public/md/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/public/admin/jquery.gritter.css">
    <link rel="stylesheet" type="text/css" href="/public/admin/animate.css">
    <link rel="stylesheet" type="text/css" href="/public/style/style.css">
    <link rel="stylesheet" type="text/css" href="/public/plugins/toastr/toastr.min.css">
    @yield('css')
    <script src="/public/scripts/jquery-2.1.1.min.js"></script>
</head>
<body>
@yield('content')
<script type="text/javascript" src="/public/md/js/bootstrap.min.js"></script>
<script src="/public/admin/jquery.metisMenu.js"></script>
<script src="/public/admin/jquery.slimscroll.min.js"></script>
<script src="/public/admin/pace.min.js"></script>
<script src="/public/admin/hs.js"></script>
<script src="/public/plugins/toastr/toastr.min.js"></script>
</body>
</html>