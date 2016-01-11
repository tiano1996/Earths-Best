<html>
<head>
    <link rel="stylesheet" href="/public/md/css/bootstrap.min.css">
    <style type="text/css">
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, "Hiragino Sans GB", "Hiragino Sans GB W3", "Microsoft YaHei UI", "Microsoft YaHei", "WenQuanYi Micro Hei", sans-serif;
        }

        .margin-fix {
            margin: 50px 100px 30px 50px;
        }

        td {
            font-size: 14px;
        }

        button[type='submit'] {
            color: #337ab7;
            border: none;
            background-color: transparent;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul class="list-unstyled"> @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h3 class="margin-fix">用户列表<a href="{{route('admin.user.create')}}" class="pull-right">新增用户</a></h3>
        <table class="table table-hover">
            <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>用户名</th>
                <th>email</th>
                <th>create</th>
                <th>授权</th>
                <th>启用</th>
                <th>管理</th>
            </tr>
            </thead>
            <tbody class="table-bordered">
            @foreach($users as $user)
                <tr>
                    <td></td>
                    <td>{{$user->id}}</td>
                    <td><a href="#" onclick="window.open('/user/{{$user->id}}')">{{$user->username}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->admin?"是":"否"}}</td>
                    <td>{{$user->confirmed?"是":"否"}}</td>
                    <td>
                        <a href="{{route('admin.user.edit',$user->id)}}" class="glyphicon glyphicon-edit"> </a>
                        <form action="{{route('admin.user.destroy',$user->id)}}" method="POST" style="display: inline;">
                            <input name="_method" type="hidden" value="DELETE">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="glyphicon glyphicon-trash"></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
@include('partial.notify')
</html>