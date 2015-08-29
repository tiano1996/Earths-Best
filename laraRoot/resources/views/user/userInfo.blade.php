<!-- 个人信息 面板 -->
<div class="bg-info">
    <div class="info-base">
        <div class="info-title">
            <i class="fa fa-user"></i>&nbsp;个人中心
        </div>
        <div class="profile">
            <img src="http://img0.bdstatic.com/img/image/shouye/qdmmx06.jpg" alt="">
            <a href="#" class="user-name">{{Auth::user()->user_name}}</a>
            <span class="fa fa-male"></span><span class="fa fa-female"></span>
            <span class="jobs">前端攻城狮</span>
            <a href="#">99+</a>&nbsp;文章&nbsp;&#124;&nbsp;<a href="#">99+</a>&nbsp;评论
        </div>
        <dl class="profile-info">
            <dt>登陆邮箱</dt><dd>{{Auth::user()->email}}</dd>
            <dt>注册时间</dt><dd>{{Auth::user()->created_at}}</dd>
            <dt>最后登录</dt><dd>{{Auth::user()->last_login}}</dd>
        </dl>
    </div>
</div>