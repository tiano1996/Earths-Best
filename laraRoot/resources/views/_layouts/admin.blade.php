<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')后台首页@show : MNHUWI Professional Outdoor Photograpy</title>
    <link href="/public/styles/bootstrap.min.css" rel="stylesheet">
    <link href="/public/styles/main.css" rel="stylesheet">
    @yield('css')
    <link href="/public/font-awesome/css/font-awesome.css" rel="stylesheet">
    <script src="/public/scripts/jquery-2.1.1.min.js"></script>
</head>
    
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">首页</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/admin">后台首页</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="/admin/comments">管理评论</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="/admin/events">行程</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="/auth/login">Login</a></li>
                    <li><a href="/auth/register">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/auth/logout">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')
<div class="container">
    <div class="row">
        <div class="subfooter">
            <div class="col-md-9 text-center">
                <p>Site template by <a href="{{Config::get('app.url')}}">BlueStrap</a> | CopyRight&copy;2015. All
                    rights
                    reserved.</p>
            </div>
            <div class="col-md-3">
                <ul class="contact pull-right">
                    <li><a id="goTop" title="返回顶部" href="javascript:;"><i class="fa fa-chevron-up fa-lg"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="/public/scripts/bootstrap.min.js"></script>
<script src="/public/scripts/bootstrap-dialog.min.js"></script>
<script src="/public/scripts/hs.js"></script>
</body>
