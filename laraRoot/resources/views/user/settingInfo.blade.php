@extends('_layouts.index')
@section('content')
    <div class="container">
        <div class="row">
            <!-- 左侧容器 main-base -->
            <div class="col-md-9 main-base">
                <div class="bg-info">
                    <div class="info-base setitng-info-base">
                        <div class="info-title">
                            <i class="fa fa-gear"></i>&nbsp;设置 - 基本信息
                        </div>
                        <form class="row" action="" method="post">
                            <div class="col-md-5 col-md-offset-2">
                                <div class="form-group">
                                    <label>当前账号</label>

                                    <p class="using-email">popohum@popohum.com</p>
                                </div>
                                <div class="form-group">
                                    <label for="title">昵称<span>12 到 120 字节，当前 0 字节</span></label>
                                    <input class="form-control" type="text" name="title" placeholder="popohum">
                                </div>
                                <div class="form-group">
                                    性别&nbsp;&nbsp;
                                    <label for="male" class="radio-inline">
                                        <input type="radio" id="male" name="sex" value="1">男
                                    </label>
                                    <label for="female" class="radio-inline">
                                        <input type="radio" id="female" name="sex" value="2">女
                                    </label>
                                    <label for="sexunknow" class="radio-inline">
                                        <input type="radio" id="sexunknow" name="sex" value="3">保密
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="pType">职业<span>请选择职业</span></label>
                                    <select class="form-control" name="pType" id="" value="1">
                                        <option value="1">前端工程师</option>
                                        <option value="">美工</option>
                                        <option value="">设计师</option>
                                        <option value="">php工程师</option>
                                    </select>
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