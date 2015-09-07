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
                        <form class="edit-form" action="" method="post">
                            <div class="form-group">
                                <label for="title">文章标题<span>必填， 12 到 120 字节，当前 0 字节</span></label>
                                <input class="form-control" type="text" name="title" placeholder="文章标题">
                                <span class="pull-right post-err">请填写文章标题</span>
                            </div>
                            <div class="form-group">
                                <label for="source">文章来源<span>如转载文章，请填写完整原文URL地址</span></label>
                                <input class="form-control" type="text" name="source" placeholder="转载来源URL">
                            </div>
                            <div class="form-group">
                                <label for="pType">文章分类<span>必选</span></label>
                                <select class="form-control" name="pType" id="" value="1">
                                    <option value="1">-请选择分类-</option>
                                    <option value="">资源分享</option>
                                    <option value="">经验分享</option>
                                    <option value="">疑难解答</option>
                                </select>
                                <span class="pull-right post-err">请选择分类</span>
                            </div>
                            <div class="form-group">
                                <label for="content">文章正文<span>使用MarkDown语法，24 到 20480 字节，当前 0 字节</span></label>
                                <textarea class="form-control" name="content" id="content" cols="30"
                                          rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="badge">文章标签<span>最多设置5个标签，请用逗号隔开</span></label>
                                <textarea class="form-control" name="badge" cols="30" rows="2"></textarea>

                                <div class="post-edit-badge">
                                    <span class="post-badge-tit">热门标签：</span>
                                    <span>angularJS</span>
                                    <span>bootstrap</span>
                                    <span>招聘信息</span>
                                    <span>外包</span>
                                    <span>css3</span>
                                    <span>linux</span>
                                    <span>javascript</span>
                                    <span>fontawsom</span>
                                    <span>微信开发</span>
                                </div>
                            </div>
                            <a class="btn btn-info btn-markdown" href="javascript:void(0)">MarkDown语法提示&#47;正文预览</a>
                            <input type="submit" class="btn btn-success" value="发布">
                            <input type="button" class="btn" value="取消">
                        </form>
                    </div>
                </div>
            </div>
            <!-- end 右侧容器 -->
        </div>
    </div>
@endsection
<script>
    // markdowm语法 正文与预览切换
    $('.btn-markdown').on('click', function() {
        $('#preview').toggle();
        $('#p-markdown').toggle();
        /* Act on the event */
    });
</script>