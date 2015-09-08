@extends('_layouts.index')
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
                            <li class="pull-right post-style">
                                <a href="javascript:"><i class="fa fa-th-large"></i></a>
                            </li>
                            <li class="pull-right new-article">
                                <a href="/user/article/create" class="btn btn-success">发表新文章</a>
                            </li>
                        </ul>
                        <ul class="tag list-unstyled clearfix">
                            @foreach($tags as $tag)
                                <li><a href="/article/tags/{{urlencode($tag)}}" class="badge">{{$tag}}</a></li>
                            @endforeach
                            <li><a href="#" class="badge badge-success"><i class="fa fa-plus"></i> 更多</a></li>
                        </ul>

                        <div class="post-list">
                            @foreach($articles as $article)
                                <div class="post">
                                    <div class="post-head">
                                        <a href="/article/{{$article->id}}"><span class="fa fa-share-alt"></span>
                                            {{$article->id.'.'.$article->title}}</a>
                                    </div>
                                    <div class="post-content">
                                        <p>{{$article->introduction}}</p>
                                    </div>
                                    <div class="post-footer">
                                        <i class="fa fa-user"></i>&nbsp;<a href="#">popohum</a>
                                        <i class="fa fa-edit"></i>&nbsp;<span>{{$article->updated_at}}</span>
                                        <i class="fa fa-reply"></i>&nbsp;<span>{{($article->last_reply)?$article->last_reply:0}}</span>
                                        <i class="fa fa-eye"></i><span> {{$article->view}}</span>
                                        <i class="fa fa-comment"></i><span>{{count($article->comment)}}</span>
                                        @foreach(explode(',',$article->slug) as $tag)
                                            <a class="post-badge" href="/article/tag/{{$tag}}">{{$tag}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
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
        $('.post-style>a').on('click', function () {
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
