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
                        @if(\Session::has('info'))
                            <h2 class="text-primary text-center">{{Session::get('info')}}</h2>
                        @else
                            <form class="row" action="/user/setting/password" method="post">
                                <div class="col-md-5 col-md-offset-2">
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                            <ul class="list-unstyled">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="pwdOld">当前密码</label>
                                        <input class="form-control" type="password" name="pwdOld" placeholder="原密码">
                                        <span class="pull-right post-err">{{Session::has('msg')?Session::get('msg'):''}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="pwdNew">新密码</label>
                                        <input class="form-control" type="password" name="pwdNew" placeholder="新密码">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwdRe">当前密码</label>
                                        <input class="form-control" type="password" name="pwdRe" placeholder="重复新密码">
                                        <span class="pull-right post-err">密码输入不一致</span>
                                    </div>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="submit" class="btn btn-success" value="保存">
                                </div>
                            </form>
                        @endif
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

