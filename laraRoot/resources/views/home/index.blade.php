@extends('_layouts.index')
@section('css')
    <style>

    </style>
@stop
@section('content')
    <div class="container">
        <div class="row">
            <!-- 左侧容器 main-base -->
            <div class="col-md-9 main-base">
                <div class="bg-info">
                    <div class="info-base main-info-base">
                        <ul class="cate list-unstyled clearfix">
                            <li class="active"><a href="#">最新发布</a></li>
                            <li><a href="#">经验分享</a></li>
                            <li><a href="#">疑难解答</a></li>
                            <li><a href="#">资源分享</a></li>
                            <li class="pull-right post-style"><a href="javascript:"><i class="fa fa-th-large"></i></a>
                            </li>
                            <li class="pull-right new-article"><a href="createPsot.html"
                                                                  class="btn btn-success">发表新文章</a></li>
                        </ul>
                        <ul class="tag list-unstyled clearfix">
                            <li><a href="#" class="badge">angularJS</a></li>
                            <li><a href="#" class="badge">Bootstrap</a></li>
                            <li><a href="#" class="badge">招聘</a></li>
                            <li><a href="#" class="badge">HMTL预处理</a></li>
                            <li><a href="#" class="badge badge-success"><i class="fa fa-plus"></i> 更多</a></li>
                        </ul>

                        <div class="post-list">
                            <div class="post">
                                <div class="post-head">
                                    <a href="/post/1"><span class="fa fa-share-alt"></span>Awesome Node.js development
                                        tools for 2015 tools for 2015</a>
                                    <i class="fa fa-lg fa-commenting pull-right" title="评论">58</i>
                                </div>
                                <div class="post-content">
                                    <p>
                                        With the arrival of Node.js, creating a website in JavaScript is very easy and
                                        cost-effective. This framework brings a massive changeover in the web
                                        application development with the advanced push innovation instead of using old
                                        web sockets. With these
                                        beneficial aspects, [Node.js][2] is gaining popularity among web developers who
                                        aspire to develop their next website in this framework. …
                                    </p>
                                </div>
                                <div class="post-footer">
                                    <i class="fa fa-user"></i>&nbsp;<a href="#">popohum</a>
                                    <i class="fa fa-edit"></i>&nbsp;<span>8-25 17:30</span>
                                    <i class="fa fa-reply"></i>&nbsp;<span>8-25 18:00</span>
                                    <a class="post-badge" href="#">angularJS</a><a class="post-badge"
                                                                                   href="#">Bootstrap</a><a
                                            class="post-badge" href="#">angularJS</a><a class="post-badge" href="#">Bootstrap</a><a
                                            class="post-badge" href="#">angularJS</a><a class="post-badge" href="#">Bootstrap</a>
                                </div>
                            </div>
                            <div class="post">
                                <div class="post-head">
                                    <a href="/post/2"><span class="fa fa-tag"></span>这个是中文的标题哦，哈哈哈你看怎么样啊嗯？ popohum兄</a>
                                    <i class="fa fa-lg fa-commenting pull-right" title="评论">58</i>
                                </div>
                                <div class="post-content">
                                    <p>
                                        With the arrival of Node.js, creating a website in JavaScript is very easy and
                                        cost-effective. This framework brings a massive changeover in the web
                                        application development with the advanced push innovation instead of using old
                                        web sockets. With these
                                        beneficial aspects, [Node.js][2] is gaining popularity among web developers who
                                        aspire to develop their next website in this framework. …
                                    </p>
                                </div>
                                <div class="post-footer">
                                    <i class="fa fa-user"></i>&nbsp;<a href="#">popohum</a>
                                    <i class="fa fa-edit"></i>&nbsp;<span>8-25 17:30</span>
                                    <i class="fa fa-reply"></i>&nbsp;<span>8-25 18:00</span>
                                    <a class="post-badge" href="#">angularJS</a><a class="post-badge"
                                                                                   href="#">Bootstrap</a>
                                </div>
                            </div>
                            <div class="post">
                                <div class="post-head">
                                    <a href="/post/3"><span class="fa fa-tag"></span>Awesome Node.js development Awesome
                                        Node.js deve5</a>
                                    <i class="fa fa-lg fa-commenting pull-right" title="评论">58</i>
                                </div>
                                <div class="post-content">
                                    <p>
                                        With the arrival of Node.js, creating a website in JavaScript is very easy and
                                        cost-effective. This framework brings a massive changeover in the web
                                        application development with the advanced push innovation instead of using old
                                        web sockets. With these
                                        beneficial aspects, [Node.js][2] is gaining popularity among web developers who
                                        aspire to develop their next website in this framework. …
                                    </p>
                                </div>
                                <div class="post-footer">
                                    <i class="fa fa-user"></i>&nbsp;<a href="#">popohum</a>
                                    <i class="fa fa-edit"></i>&nbsp;<span>8-25 17:30</span>
                                    <i class="fa fa-reply"></i>&nbsp;<span>8-25 18:00</span>
                                    <a class="post-badge" href="#">angularJS</a><a class="post-badge"
                                                                                   href="#">Bootstrap</a>
                                </div>
                            </div>
                            <div class="post">
                                <div class="post-head">
                                    <a href="/post/4"><span class="fa fa-tag"></span>Awesome Node.js development tools for
                                        2015</a>
                                    <i class="fa fa-lg fa-commenting pull-right" title="评论">58</i>
                                </div>
                                <div class="post-content">
                                    <p>
                                        With the arrival of Node.js, creating a website in JavaScript is very easy and
                                        cost-effective. This framework brings a massive changeover in the web
                                        application development with the advanced push innovation instead of using old
                                        web sockets. With these
                                        beneficial aspects, [Node.js][2] is gaining popularity among web developers who
                                        aspire to develop their next website in this framework. …
                                    </p>
                                </div>
                                <div class="post-footer">
                                    <i class="fa fa-user"></i>&nbsp;<a href="#">popohum</a>
                                    <i class="fa fa-edit"></i>&nbsp;<span>8-25 17:30</span>
                                    <i class="fa fa-reply"></i>&nbsp;<span>8-25 18:00</span>
                                    <a class="post-badge" href="#">angularJS</a><a class="post-badge"
                                                                                   href="#">Bootstrap</a>
                                </div>
                            </div>
                            <div class="post">
                                <div class="post-head">
                                    <a href="/post/5"><span class="fa fa-tag"></span>Awesome Node.js development tools for
                                        2015</a>
                                    <i class="fa fa-lg fa-commenting pull-right" title="评论">58</i>
                                </div>
                                <div class="post-content">
                                    <p>
                                        With the arrival of Node.js, creating a website in JavaScript is very easy and
                                        cost-effective. This framework brings a massive changeover in the web
                                        application development with the advanced push innovation instead of using old
                                        web sockets. With these
                                        beneficial aspects, [Node.js][2] is gaining popularity among web developers who
                                        aspire to develop their next website in this framework. …
                                    </p>
                                </div>
                                <div class="post-footer">
                                    <i class="fa fa-user"></i>&nbsp;<a href="#">popohum</a>
                                    <i class="fa fa-edit"></i>&nbsp;<span>8-25 17:30</span>
                                    <i class="fa fa-reply"></i>&nbsp;<span>8-25 18:00</span>
                                    <a class="post-badge" href="#">angularJS</a><a class="post-badge"
                                                                                   href="#">Bootstrap</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 分页 -->
                <div class="page-base">
                    <div class="page-ctrl">
                        <a href="#"><i class="fa fa-angle-double-left"></i></a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">5</a>
                        <a href="#">5</a>
                        <a href="#"><i class="fa fa-angle-double-right"></i></a>
                    </div>
                    <div class="page-ctrl">
                        <a href="#" class="active">10</a>
                        <a href="#">20</a>
                        <a href="#">50</a>
                    </div>
                </div>
            </div>
            <!-- end 左侧容器 -->
            <!-- 右侧容器 -->
            <div class="col-md-3 side-base">
                @include('partial.top10')
                @include('partial.links')
            </div>
            <!-- end 右侧容器 -->
        </div>
    </div>
    <script>
        $('.post-style>a').on('click', function() {
            if ($('.post .post-content').css('display') == 'none') {
                $(this).find('>i').addClass('fa-th-list').removeClass('fa-th-large');
                $('.post .post-content').slideDown('normal');
            } else {
                $(this).find('>i').removeClass('fa-th-list').addClass('fa-th-large');
                $('.post .post-content').slideUp('normal');
            }
        })
    </script>
@endsection
