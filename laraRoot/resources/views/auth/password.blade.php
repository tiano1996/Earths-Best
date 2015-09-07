@extends('_layouts.index')
@section('content')
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

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
                <!-- 左侧容器 main-base -->
                <div class="col-md-12 main-base">
                    <div class="bg-info">
                        <div class="info-base setitng-info-base">
                            <div class="info-title">
                                &nbsp;找回密码
                            </div>
                            <form action="" method="post">
                                <div class="col-md-4 col-md-offset-4 pwdfind">
                                    <div class="form-group ">
                                        <label for="email">请输入邮箱</label>
                                        <input class="form-control" type="text" name="email" placeholder="popohum">
                                    </div>
                                    <button class="btn btn-success">发送</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end 左侧容器 -->
        </div>
    </div>
@endsection
