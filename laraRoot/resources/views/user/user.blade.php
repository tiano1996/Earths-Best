@extends('_layouts.index')
@section('content')
    <div class="container">
        <div class="row">
            <!-- 左侧容器 main-base -->
            <div class="col-md-9 main-base">
                <div class="bg-info">
                    <div class="info-base main-info-base">
                        <ul class="cate list-unstyled clearfix">
                            <li class="active"><a href="#">我的文章</a></li>
                            <li><a href="#">我的回复</a></li>
                            <li class="pull-right post-style">
                                <a href="javascript:;"><i class="fa fa-th-large"></i></a>
                            </li>
                            <li class="pull-right new-article">
                                <a href="{{route('user.article.create')}}" class="btn btn-success">发表新文章</a>
                            </li>
                        </ul>

                        <div class="post-list">
                            @foreach($articles as $article)
                                <div class="post">
                                    <div class="post-head">
                                        <a href="/article/{{$article->id}}"><span class="fa fa-share-alt"></span>
                                            {{$article->id.'.'.$article->title}}</a>

                                        <div class="edit-btn">
                                            <a href="javascript:void(0)">操作</a>

                                            <div class="edit-post">
                                                <a href="{{route('article.show',[$article->id])}}">查看</a>
                                                <a href="{{route('user.article.edit',[$article->id])}}">编辑</a>
                                                <form action="{{route('user.article.destroy',[$article->id])}}" method="POST">
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn-link" value="删除">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-content">
                                        <p>{{$article->introduction}}</p>
                                    </div>
                                    <div class="post-footer">
                                        <i class="fa fa-user"></i>&nbsp;<a href="#">popohum</a>
                                        <i class="fa fa-edit"></i>&nbsp;<span>{{$article->updated_at}}</span>
                                        <i class="fa fa-reply"></i>&nbsp;<span>{{($article->last_reply)?$article->last_reply:$article->created_at}}</span>
                                        <i class="fa fa-eye"></i><span> {{$article->view}}</span>
                                        <i class="fa fa-comment"></i><span> {{count($article->comment)}}</span>
                                        @foreach(explode(',',$article->tag) as $tag)
                                            <a class="post-badge" href="/article/tags/{{$tag}}">{{$tag}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- 分页 -->
                <div class="page-base">
                    {!! $articles->render() !!}
                    <div class="page-ctrl">
                        <a href="{!! $articles->url('10') !!}" class="active">10</a>
                        <a href="{!! $articles->url('20') !!}">20</a>
                        <a href="{!! $articles->url('50') !!}">50</a>
                    </div>
                </div>
            </div>
            <!-- end 左侧容器 -->
            <!-- 右侧容器 -->
            <div class="col-md-3 side-base">
                @include('user.userInfo')
                @include('user.setting')
            </div>
        </div>
    </div>
    <!-- end 右侧容器 -->
    <script>
        // 个人中心操作按钮下拉
        $(document).ready(function () {
            $('.edit-btn > a').on('mouseover', function () {
                $(this).parent().css('z-index', '1');
                $(this).addClass('active');
                $(this).next().stop().show('fast');
                /* Act on the event */
            });
            $('.edit-btn').on('mouseleave', function () {
                $(this).find('.edit-post').stop().hide('normal');
                $(this).css('z-index', '0');
                $(this).find('.active').removeClass('active');
                /* Act on the event */
            });
            $('.post-style>a').on('click', function () {
                if ($('.post .post-content').css('display') == 'none') {
                    $(this).find('>i').addClass('fa-th-list').removeClass('fa-th-large');
                    $('.post .post-content').slideDown('normal');
                } else {
                    $(this).find('>i').removeClass('fa-th-list').addClass('fa-th-large');
                    $('.post .post-content').slideUp('normal');
                }
            })
        });
    </script>
@endsection
