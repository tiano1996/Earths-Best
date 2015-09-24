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
                        <form action="/password/reset" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="col-md-4 col-md-offset-4 pwdfind">
                                <div class="form-group">
                                    <label for="email">E-Mail Address</label>

                                    <div class="form-group">
                                        <input class="form-control" type="email" name="email"
                                               value="{{ $data->email }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">新密码</label>
                                    <input class="form-control" type="password" name="password" placeholder="请输入密码">
                                </div>
                                <div class="form-group ">
                                    <label for="password_confirmation">重复新密码</label>
                                    <input class="form-control" type="password" name="password_confirmation"
                                           placeholder="请确认密码">
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
