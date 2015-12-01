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
        <h3 class="margin-fix">文章列表<a href="{{route('admin.article.create')}}" class="pull-right">新增文章</a></h3>
        <table class="table table-hover">
            <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>标题</th>
                <th>create</th>
                <th>update</th>
                <th>reply</th>
                <th>作者</th>
                <th>管理</th>
            </tr>
            </thead>
            <tbody class="table-bordered">
            @foreach($articles as $article)
                <tr>
                    <td></td>
                    <td>{{$article->id}}</td>
                    <td><a href="#" onclick="window.open('{{route('article.show',$article->id)}}')">{{$article->title}}</a></td>
                    <td>{{$article->created_at}}</td>
                    <td>{{$article->updated_at}}</td>
                    <td>{{$article->last_reply}}</td>
                    <td>{{ \App\Models\User::find($article->user_id)->username}}</td>
                    <td><a href="{{route('admin.article.edit',$article->id)}}" class="btn btn-success">编辑</a>

                        <form action="{{route('admin.article.destroy',$article->id)}}" method="POST"
                              style="display: inline;">
                            <input name="_method" type="hidden" value="DELETE">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="btn btn-danger">删除</button>
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