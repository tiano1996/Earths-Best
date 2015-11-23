{{--$data = getMenu();--}}
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
							</span>  <span class="text-muted text-xs block">超级管理员
								<b class="caret">
                                </b></span>
						</span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li>
                            <a href="form_avatar.html">
                                修改头像
                            </a>
                        </li>
                        <li>
                            <a href="profile.html">
                                个人资料
                            </a>
                        </li>
                        <li>
                            <a href="contacts.html">
                                联系我们
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
                            <a href="doAdminAction.php?act=exit">
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
                <a href="../index.php">
                    <i class="fa fa-th-large">
                    </i> <span class="nav-label">分类管理</span>
					<span class="fa arrow">
					</span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="cateList.php" target="mainBox">
                            分类列表
                        </a>
                    </li>
                    <li>
                        <a href="cateAdd.php" target="mainBox">
                            添加分类
                        </a>
                    </li>
                    <li>
                        <a href="cateDelete.php" target="mainBox">
                            删除分类
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href=" ">
                    <i class="fa fa-user">
                    </i>
                    <span class="nav-label">管理员管理</span>
					<span class="fa arrow">
					</span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="adminList.php" target="mainBox">
                            管理员列表
                        </a>
                    </li>
                    <li>
                        <a href="adminAdd.php" target="mainBox">
                            添加管理员
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href=" ">
                    <i class="fa fa-suitcase">
                    </i>
                    <span class="nav-label">商品管理</span>
					<span class="fa arrow">
					</span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="goodsList.php" target="mainBox">
                            商品列表
                        </a>
                    </li>
                    <li>
                        <a href="goodsAdd.php" target="mainBox">
                            添加商品
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href=" ">
                    <i class="fa fa-th-list">
                    </i>
                    <span class="nav-label">菜单列表</span>
					<span class="fa arrow">
					</span>
                </a>
                <ul class='nav nav-second-level'>
                        {{--echo "<li><a href='javascript:;' target='mainBox'>";--}}
                        {{--echo "{$key['cName']}";--}}
                        {{--echo "</a></li>";--}}
                </ul>
            </li>
        </ul>
    </div>
</nav>
