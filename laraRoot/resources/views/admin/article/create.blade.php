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
        <h3 class="margin-fix">新增文章<a href="{{route('admin.article.index')}}" class="pull-right">文章列表</a></h3>
    </div>
    <!-- markdown -->
    <div class="row">
        <form class="create-form" action="{{route('admin.article.store')}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="title">文章标题:</label>
                <input class="form-control" type="text" name="title" placeholder="文章标题" required>
            </div>
            <div class="form-group">
                <label for="pType">文章分类:</label>
                <select class="form-control" name="cate" id="cateOption" title="分类" style="max-width: 200px">
                    <option value="1" selected>-请选择分类-</option>
                    @foreach($category as $v)
                        <option value="{{$v->id}}">{{$v->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="content">文章正文 <span>支持MarkDown语法</span></label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="badge">文章标签 <span>最多设置5个标签，请用逗号隔开</span></label>
                <textarea class="form-control" name="tag" cols="30" rows="2" ondrop="false" title="tags"></textarea>

                <div class="post-edit-badge">
                    <span class="post-badge-tit">热门标签：</span>
                    @foreach($hotTag as $tag)
                        <a class="badge" href="#">{{$tag}}</a>
                    @endforeach
                </div>
            </div>
            <input type="submit" class="btn btn-success" value="发布">
        </form>
    </div>
</div>
<script type="text/javascript" src="/public/md-editor/editor.js"></script>
<script type="text/javascript" src="/public/md-editor/marked.js"></script>
<script>
    var editor = new Editor({
        element: document.getElementById('editor')
    });
    editor.render();
</script>
</body>
</html>