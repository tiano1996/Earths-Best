@extends('_layouts.index')
@section('content')
    <div class="container" style='padding-top:100px'>
        <div class="row">
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
            <form action="#" method="post" class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <label for="title">昵称<span>6 到 12字节</span></label>
                        <input class="form-control" type="text" name="title" placeholder="登录邮箱">
                    </div>
                    <div class="form-group">
                        <label for="password">密码&nbsp;&nbsp;</label>
                        <input class="form-control" type="text" name="title" placeholder="密码">
                    </div>
                    <div class="form-group">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
