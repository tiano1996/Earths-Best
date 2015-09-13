@extends('_layouts.index')
@section('content')
    <div class="container post-page">
        <div class="row">
            <!-- 左侧容器 main-base -->
            <div class="col-md-9 main-base">
                <div class="bg-info">
                    <div class="info-base main-info-base">
                        <div class="post">
                            <h3>{{$article->title}}</h3>

                            <div class="post-footer post-info-footer">
                                <i class="fa fa-edit"></i>&nbsp;<span>{{$article->updated_at}}</span>
                                <i class="fa fa-reply"></i>&nbsp;<span>{{($article->last_reply)?$article->last_reply:$article->created_at}}</span>
                                <i class="fa fa-eye"></i><span> {{$article->view}}</span>
                                <i class="fa fa-comment"></i><span> {{count($article->comment)}}</span>
                                @foreach($article->slug as $slug)
                                    <a class="post-badge" href="/article/tags/{{$slug}}">{{$slug}}</a>
                                @endforeach
                            </div>
                            <div class="post-content">
                                <pre>
                                    {{$article->content}}
                                </pre>
                            </div>
                            <div class="post-footer">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-info comment-panel">
                    <h4>评论：{{$article->title}}</h4>

                    <form action="#" method="post">
                        <textarea name="comment" rows="5" cols="116"></textarea>
                        <input type="submit" class="btn btn-success" value="发布评论"/>
                        <a href="#" class="btn btn-warning">重写</a>
							<span class="pull-right">已经输入3个字符，还可输入997个字符。&nbsp;&nbsp;&nbsp;&nbsp;
							</span>
                    </form>
                    @foreach($article->comment as $comment)
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object img-rounded" alt="author head"
                                     src="http://img0.bdstatic.com/img/image/shouye/qdmmx06.jpg" >
                            </div>
                            <div class="media-body">
                                <pre>{{$comment->text}}</pre>
                                <a href="#" class="pull-right">回复</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- end 左侧容器 -->
            <!-- 右侧容器 -->
            <div class="col-md-3 side-base">
                @include('user.author')
                @include('partial.top10')
            </div>
            <!-- end 右侧容器 -->
        </div>
    </div>
@endsection