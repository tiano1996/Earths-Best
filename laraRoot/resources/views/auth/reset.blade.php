@extends('_layouts.index')
@section('content')
    <div class="container">
        <div class="row">
            <!-- 左侧容器 main-base -->
            <div class="col-md-12 main-base">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="bg-info">
                    <div class="info-base setitng-info-base">
                        <div class="info-title">
                            &nbsp;重设密码
                        </div>
                        <form action="" method="post">
                            <div class="col-md-4 col-md-offset-4 pwdfind">
                                <div class="form-group ">
                                    <label for="pwdNew">新密码</label>
                                    <input class="form-control" type="text" name="pwdNew" placeholder="popohum">
                                </div>
                                <div class="form-group ">
                                    <label for="pwdRe">重复新密码</label>
                                    <input class="form-control" type="text" name="pwdRe" placeholder="popohum">
                                </div>
                                <button class="btn btn-success">保存</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end 左侧容器 -->
        </div>
    </div>
@endsection
