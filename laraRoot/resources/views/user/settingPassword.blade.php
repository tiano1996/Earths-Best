@extends('_layouts.index')
@section('content')
    <div class="container">
        <div class="row">
            <!-- 左侧容器 main-base -->
            <div class="col-md-9 main-base">
                <div class="bg-info">
                    <div class="info-base setitng-info-base">
                        <div class="info-title">
                            <i class="fa fa-gear"></i>&nbsp;设置 - 修改密码
                        </div>
                        <form class="row" action="" method="post">
                            <div class="col-md-5 col-md-offset-2">
                                <div class="form-group">
                                    <label for="pwdOld">当前密码</label>
                                    <input class="form-control" type="password" name="pwdOld" placeholder="">
                                    <span class="pull-right post-err">密码错误</span>
                                </div>
                                <div class="form-group">
                                    <label for="pwdNew">新密码</label>
                                    <input class="form-control" type="password" name="pwdNew" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="pwdRe">当前密码</label>
                                    <input class="form-control" type="password" name="pwdRe" placeholder="">
                                    <span class="pull-right post-err">密码输入不一致</span>
                                </div>
                                <input type="submit" class="btn btn-success" value="保存">
                                <input type="button" class="btn" value="取消">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end 左侧容器 -->
            <!-- 右侧容器 -->
            <div class="col-md-3 side-base">
                @include('user.userInfo')
                @include('user.setting')
            </div>
            <!-- end 右侧容器 -->
        </div>
    </div>
@endsection

