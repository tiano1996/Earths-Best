<html>
<head>
    <title>hehe</title>
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
                        <h3>服务器环境设置</h3>

                        <div class="hr-line-dashed"></div>
                    </div>
                    <form action="/admin/config" method="POST" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Serve 环境：</label>

                            <div class="col-sm-5">
                                <p class="form-control-static">{{$config['APP_ENV']}}</p>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label for="debug" class="col-sm-2 control-label">Debug 模式：</label>

                            <div class="col-sm-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio" @if($config['APP_DEBUG']==1) checked @endif value="open"
                                               id="debugOpen" name="debug">开启</label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" @if($config['APP_DEBUG']!=1) checked @endif value="close"
                                               id="debugClose" name="debug">
                                        关闭
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label for="debug" class="col-sm-2 control-label">Log 模式：</label>

                            <div class="col-sm-10">
                                <div class="log">
                                        <select name="log" title="log">
                                            <option value="single" @if($config['LOG_DRIVER']=='single') selected @endif>单个文件</option>
                                            <option value="daily" @if($config['LOG_DRIVER']=='daily') selected @endif>按日分隔</option>
                                            <option value="syslog" @if($config['LOG_DRIVER']=='syslog') selected @endif>系统日志</option>
                                            <option value="errorlog" @if($config['LOG_DRIVER']=='errorlog') selected @endif>错误日志</option>
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label for="key" class="col-sm-2 control-label">加密 Key：</label>

                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="key" placeholder="app key"
                                       value="{{$config['APP_KEY']}}" required>
                                <span class="help-block m-b-none">32位随机字符串</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label for="key" class="col-sm-2 control-label">Server Url：</label>

                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="url" placeholder="app url"
                                       value="{{$config['APP_URL']}}" required>
                                <span class="help-block m-b-none">服务器地址，http://</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="host">Mail Host：</label>

                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="host" placeholder="mail host"
                                       value="{{$config['MAIL_HOST']}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="username">Mail Username：</label>

                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="username" placeholder="mail username"
                                       value="{{$config['MAIL_USERNAME']}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="password">Mail Password：</label>

                            <div class="col-sm-5">
                                <input class="form-control" type="password" name="password" placeholder="mail password"
                                       value="{{$config['MAIL_PASSWORD']}}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="submit" class="btn btn-success btn-lg" value="保存">
                                <button class="btn btn-lg" type="submit">取消</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partial.notify')
</body>
</html>