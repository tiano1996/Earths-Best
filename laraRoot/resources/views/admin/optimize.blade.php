<html>
<head>
    <link rel="stylesheet" href="/public/md/css/bootstrap.min.css">
    <style type="text/css">
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, "Hiragino Sans GB", "Hiragino Sans GB W3", "Microsoft YaHei UI", "Microsoft YaHei", "WenQuanYi Micro Hei", sans-serif;
        }

        .hr-line-dashed {
            border-top: 1px dashed #e7eaec;
            color: #ffffff;
            background-color: #ffffff;
            height: 1px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
<div>
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
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="row">
                        <h3>服务器优化</h3>

                        <div class="hr-line-dashed"></div>
                    </div>
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">清除 Session：</label>
                            <div class="col-sm-5">
                                <form action="/admin/optimize/clearSession" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="submit" class="btn btn-info" value="确定">
                                </form>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                    </div>

                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">清除 Cache：</label>

                            <div class="col-sm-5">
                                <form action="/admin/optimize/clearCache" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="submit" class="btn btn-info" value="确定">
                                </form>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                    </div>

                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">刷新 Menu：</label>
                            <div class="col-sm-5">
                                <form action="/admin/optimize/flashMenu" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="submit" class="btn btn-info" value="确定">
                                </form>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@include('partial.notify')
</body>
</html>