<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
					<span>
						<img alt="image" class="img-circle" src="../public/img/profile_small.jpg"/>
					</span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="../index.php">
						<span class="clear">
							<span class="block m-t-xs">
								<strong class="font-bold">{{Auth::User()->username}}</strong>
							</span>
                            <span class="text-muted text-xs block">超级管理员
								<b class="caret"> </b>
                            </span>
						</span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li>
                            <a href="admin/user" target="mainBox">
                                管理员列表
                            </a>
                        </li>
                        <li>
                            <a href="mailbox.html">
                                信箱
                            </a>
                        </li>
                        <li class="divider">
                        </li>
                        <li>
                            <a href="/auth/logout">
                                安全退出
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    No+
                </div>
            </li>
            <li class="active">
                <a href=" ">
                    <i class="fa fa-suitcase"> </i> <span class="nav-label">文章管理</span> <span class="fa arrow"> </span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="admin/article" target="mainBox">
                            文章列表
                        </a>
                    </li>
                    <li>
                        <a href="admin/article/create" target="mainBox">
                            添加文章
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-th-large"></i> <span class="nav-label">分类管理</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="admin/cate" target="mainBox">
                            菜单列表
                        </a>
                    </li>
                    <li>
                        <a href="admin/cate/create" target="mainBox">
                            添加菜单
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href=" ">
                    <i class="fa fa-user"></i><span class="nav-label">管理员管理</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="admin/user" target="mainBox">
                            管理员列表
                        </a>
                    </li>
                    <li>
                        <a href="admin/user/create" target="mainBox">
                            添加管理员
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href=" ">
                    <i class="fa fa-cog"></i><span class="nav-label">高级设置</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="admin/config" target="mainBox">
                            系统设置
                        </a>
                    </li>
                    <li>
                        <a href="admin/optimize" target="mainBox">
                            系统优化
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
