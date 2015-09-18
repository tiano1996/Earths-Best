@extends('_layouts.index')
@section('content')
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-success text-center">
                    <span>邮件发送成功</span>
                </div>
                <script>
                    setInterval(function () {
                        window.location = '/'
                    }, 3000);
                </script>
            @else
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
                                <form action="/password/email" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="col-md-4 col-md-offset-4 pwdfind">
                                        <div class="form-group ">
                                            <label for="email">请输入邮箱</label>
                                            <input class="form-control" type="text" name="email">
                                        </div>
                                        <button class="btn btn-success">发送</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- end 左侧容器 -->
        </div>
    </div>
@endsection
