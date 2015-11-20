@extends('_layouts.index')
<link rel="stylesheet" href="/public/md-editor/editor.css" />
<script type="text/javascript" src="/public/md-editor/editor.js"></script>
<script type="text/javascript" src="/public/md-editor/marked.js"></script>
@section('content')
    <div class="container">
        <div class="row">
            <!-- 主容器 -->
            <div class="col-md-10 col-md-offset-1 main-base">
                <!-- markdown -->
                <div class="bg-info">
                    <div class="info-base">
                        <div class="info-title">
                            <i class="fa fa-edit"></i>&nbsp;发表新文章
                        </div>
                        <form class="edit-form" action="{{route('user.article.store')}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="title">文章标题<span>必填， 12 到 120 字节，当前 0 字节</span></label>
                                <input class="form-control" type="text" name="title" placeholder="文章标题">
                                <span class="pull-right post-err">请填写文章标题</span>
                            </div>
                            <div class="form-group">
                                <label for="pType">文章分类<span>必选</span></label>
                                <select class="form-control" name="cate" id="cateOption" title="分类">
                                    <option value="1" selected>-请选择分类-</option>
                                    @foreach($category as $v)
                                        <option value="{{$v->id}}">{{$v->title}}</option>
                                    @endforeach
                                </select>
                                <span class="pull-right post-err">请选择分类</span>
                            </div>
                            <div class="form-group">
                                <label for="content">文章正文<span>使用MarkDown语法，24 到 20480 字节，当前 0 字节</span></label>
                                <textarea class="form-control" name="content" cols="30" rows="10" id="editor"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="badge">文章标签<span>最多设置5个标签，请用逗号隔开</span></label>
                                <textarea class="form-control" name="tag" cols="30" rows="2" ondrop="false" ></textarea>
                                <a class="btn btn-info btn-markdown" href="javascript:void(0)">MarkDown语法提示&#47;正文预览</a>
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
            </div>
            <!-- end 右侧容器 -->
        </div>
    </div>
    <script>
        var editor = new Editor({
            element: document.getElementById('editor')
        });
        editor.render();
    </script>
@endsection
