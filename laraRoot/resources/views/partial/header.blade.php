<div id="header">
    <div class="container">
        <div class="row">
            <h1 class="logo">地球最好</h1>
            <h3 class="slogo">Earth-Best</h3>
        </div>
        <div class="row hidden-xs">
            <div class="col-xs-3 descript">
                Bootstrap@HTML交流分享
            </div>
            <div class="col-xs-6 search">
                <input type="text" name='sa' class="col-xs-11" placeholder='search'/>
                <i class='fa fa-search fa-lg'></i>
            </div>
            <div class="col-xs-3 loginPanel">
                @if(Auth::guest())
                <a href="/auth/login" class="btn btn-md-success">登录</a>
                <a href="/auth/register" class="btn btn-md-primary">注册</a>
                @else
                <ul>
                    <li class="dropdown list-unstyled">
                        <a href="#" class="dropdown-toggle user-header">
                            <img src="http://img0.bdstatic.com/img/image/shouye/qdmmx06.jpg">
                        </a><span class="header-user">{{Auth::user()->username}}</span>
                        <ul class="dropdown-menu">
                            <li><a href="/user"><i class='fa fa-user'></i> 个人主页</a></li>
                            <li><a href="/user/article"><i class='fa fa-list-alt'></i> 文章列表</a></li>
                            <li><a href="/auth/logout"><i class='fa fa-sign-out'></i> 退出登录</a></li>
                        </ul>
                    </li>
                </ul>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse"
                        data-target="#bs-navbar"
                        aria-controls="bs-navbar" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <nav id="bs-navbar" class="navbar-collapse collapse text-center">
                <ul class="nav navbar-nav">
                    <li class="">
                        <a href="/"><i class="fa fa-home"></i> 全部 </a>
                    </li>
                    <li class="">
                        <a href="#">Bootstrap</a>
                    </li>
                    <li class="">
                        <a href="#">HTML</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">CSS <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">CSS</a>
                            </li>
                            <li>
                                <a href="#">LESS</a>
                            </li>
                            <li>
                                <a href="#">SASS</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">JavaScript <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="">
                                <a href="#">JQuery</a>
                            </li>
                            <li class="">
                                <a href="#">CoffeeJS</a>
                            </li>
                            <li class="">
                                <a href="#">BackboneJS</a>
                            </li>
                            <li>
                                <a href="#">AngularJS</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">PHP</a>
                    </li>
                    <li>
                        <a href="#">JAVA</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
