<!-- 设置 面板 -->
<div class="bg-info">
    <div class="info-base">
        <div class="info-title">
            <i class="fa fa-gear"></i>&nbsp;设置
        </div>
        <div class="settings">
            <a href="/user/set_info" class="{{ (Request::is('user/set_info') ? 'active' : '') }}">基本信息</a>
            <a href="/user/set_face" class="{{ (Request::is('user/set_face') ? 'active' : '') }}">上传头像</a>
            <a href="/user/set_pwd" class="{{ (Request::is('user/set_pwd') ? 'active' : '') }}">修改密码</a>
        </div>
    </div>
</div>