<html>
<head>
    <link rel="stylesheet" href="/public/md/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/md-editor/editor.css"/>
    <style type="text/css">
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, "Hiragino Sans GB", "Hiragino Sans GB W3", "Microsoft YaHei UI", "Microsoft YaHei", "WenQuanYi Micro Hei", sans-serif;
        }

        .margin-fix {
            margin: 50px 100px 30px 0;
        }

        .hr-line-dashed {
            border-top: 1px dashed #e7eaec;
            color: #ffffff;
            background-color: #ffffff;
            height: 1px;
            margin: 20px 0;
        }
        .form-control{
            max-width: 200px;
        }
        .fix-input{
            padding-top: 7px;
        }
        a:hover{
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
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
        <h3 class="margin-fix">新增用户<a href="{{route('admin.user.index')}}" class="pull-right"><i><</i> 用户列表</a></h3>
        <div class="hr-line-dashed"></div>
    </div>
    <form action="{{route('admin.user.store')}}" method="POST">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label">用户名：</label>

                <div class="col-sm-5">
                    <input type="text" name="username" class="form-control">
                </div>
            </div>
            <div class="hr-line-dashed"></div>
        </div>

        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label">邮箱：</label>

                <div class="col-sm-5">
                    <input type="email" name="email" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="hr-line-dashed"></div>
        </div>

        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label">密码：</label>

                <div class="col-sm-5">
                    <input type="password" name="password" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="hr-line-dashed"></div>
        </div>

        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label">启用：</label>

                <div class="col-sm-5 fix-input">
                    <label for="confirmed"><input type="checkbox" name="confirmed" value="yes">是</label>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
        </div>
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label">授权：</label>

                <div class="col-sm-5 fix-input">
                    <label for="admin"><input type="checkbox" name="admin" value="yes">是</label>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
        </div>

        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>

                <div class="col-sm-5">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit"  value="提交" class="btn btn-success">
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>