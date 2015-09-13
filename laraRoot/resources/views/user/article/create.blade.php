@extends('_layouts.index')
@section('content')
    <div class="container">
        <div class="row">
            <!-- 左侧容器 main-base -->
            <div class="col-md-6 main-base">
                <div class="bg-info">
                    <div class="info-base" id="preview">
                        <div class="info-title">
                            <i class="fa fa-file-text-o"></i>&nbsp;正文预览
                        </div>
                        <div class="preview-con">
                            fdsafdasfdsafdsafdsafdsafsda
                        </div>
                    </div>
                    <div class="info-base" id="p-markdown">
                        <div class="info-title">
                            <i class="fa fa-info-circle"></i>&nbsp;MarkDown 语法
                        </div>
                        <div class="preview-con">
                            kjjjkjkfajkdjdsfjsdfjksdfjdfjdfsdjkjasdfjk
                        </div>
                    </div>
                </div>
            </div>
            <!-- end 左侧容器 -->
            <!-- 右侧容器 -->
            <div class="col-md-6 side-base">
                <!-- 文章 -->
                <div class=" bg-info">
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
                                <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="badge">文章标签<span>最多设置5个标签，请用逗号隔开</span></label>
                                <textarea class="form-control" name="slug" cols="30" rows="2" ondrop="false"></textarea>

                                <div class="post-edit-badge">
                                    <span class="post-badge-tit">热门标签：</span>
                                    @foreach($hotTag as $slug)
                                        <a class="badge" href="#">{{$slug}}</a>
                                    @endforeach
                                </div>
                            </div>
                            <a class="btn btn-info btn-markdown" href="javascript:void(0)">MarkDown语法提示&#47;正文预览</a>
                            <input type="submit" class="btn btn-success" value="发布">
                        </form>
                    </div>
                </div>
            </div>
            <!-- end 右侧容器 -->
        </div>
    </div>
    <script>
        // markdowm语法 正文与预览切换
        $('.btn-markdown').on('click', function () {
            $('#preview').toggle();
            $('#p-markdown').toggle();
            /* Act on the event */
        });
    </script>
@endsection
