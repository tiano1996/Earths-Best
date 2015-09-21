<!-- 设置 面板 -->
<div class="bg-info">
    <div class="info-base">
        <div class="info-title">
            <i class="fa fa-gear"></i>&nbsp;设置
        </div>
        <div class="settings">
            <a href="/user/setting/info" class="{{ (Request::is('user/setting/info') ? 'active' : '') }}">基本信息</a>
            <a href="/user/setting/face" class="{{ (Request::is('user/setting/face') ? 'active' : '') }}">上传头像</a>
            <a href="/user/setting/password" class="{{ (Request::is('user/setting/password') ? 'active' : '') }}">修改密码</a>
        </div>
    </div>
</div>