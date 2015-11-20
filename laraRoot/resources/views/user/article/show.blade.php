@extends('_layouts.index')
<script type="text/javascript" src="/public/md-editor/marked.js"></script>
@section('content')
    <div class="container post-page">
        <div class="row">
            <!-- 左侧容器 main-base -->
            <div class="col-md-9 main-base">
                <div class="bg-info">
                    <div class="info-base main-info-base">
                        <div class="post">
                            <h3 id="article-title">{{$article->title}}</h3>

                            <div class="post-footer post-info-footer">
                                <i class="fa fa-edit"></i>&nbsp;<span>{{$article->updated_at}}</span>
                                <i class="fa fa-reply"></i>&nbsp;<span>{{($article->last_reply)?$article->last_reply:$article->created_at}}</span>
                                <i class="fa fa-eye"></i><span> {{$article->view}}</span>
                                <a class="fa fa-commenting post-badge"
                                   href="#comment-form"> {{count($article->comment)}}</a>
                                @foreach($article->tag as $tag)
                                    <a class="post-badge" href="/article/tags/{{$tag}}">{{$tag}}</a>
                                @endforeach
                            </div>
                            <div class="post-content" id="content">{{$article->content}} </div>
                            <div class="post-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-info comment-panel">
                    <h4>评论：{{$article->title}}</h4>
                    <ul class="media-list">
                        @foreach($article->comment as $comment)
                            <li class="media">
                                <a class="pull-left" href="#" id="comment-{{$comment->id}}">
                                    <img src="//www.gravatar.com/avatar/{{md5($comment->author_email)}}?s=64"
                                         alt="Picture of {{$comment->author_nickname}}"
                                         class="media-object img-rounded">
                                </a>

                                <div class="media-body">
                                    @if($comment->parent_id)<p>回复:<a
                                                href="#comment-{{$comment->parent_id}}">{{$comment->parent_id}}楼</a></p>
                                    @else <p>回复:<a href="#article-title">楼主</a></p>
                                    @endif
                                    <pre>{{$comment->text}}</pre>
                                    <ul class="list-inline meta text-muted">
                                        <li><i class="fa fa-calendar"></i> {{$comment->created_at}}</li>
                                        <li><i class="fa fa-user"></i> <a href="#">{{$comment->author_nickname}}</a>
                                        </li>
                                    </ul>
                                    <a href="javascript:comment({{$comment->id}})" class="pull-right">回复</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <form action="{{route('comment.store')}}" id="comment-form" class="comment-form" role="form" method="POST">
                        <h4>评论一下： </h4>

                        <div class="form-group">
                            <label class="sr-only" for="nickname">昵称</label>
                            <input type="text" class="form-control" name="nickname" id="nickname" placeholder="昵称" required>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="邮箱" required>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="content">评论</label>

                            <p id="comment_content"> 回复:</p>
                            <textarea rows="8" class="form-control" name="content" id='comment' placeholder="评论一下好伐啦！"
                                      style="resize:none" required></textarea>
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="article_id" value="{{$article->id}}">
                        <input type="hidden" name="p_id" id="p_id">
                        <input type="submit" class="btn btn-success" value="发布评论"/>
                        <input type="reset" class="btn  btn-warning" id="reset" value="复位">
                        <span class="pull-right" id="number">已经输入0个字符，还可输入1000个字符。&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </form>
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
    <script>
        function comment(id) {
            $('#p_id').val(id);
            $('#comment_content').html('回复：' + id + '楼 ');
        }
        $(document).ready(function () {
            $('#content').html(marked($('#content').html()));
            $('#reset').on('click', function () {
                $('#number').text("已经输入0个字符，还可输入1000个字符。").append('&nbsp;&nbsp;&nbsp;&nbsp;');
            });
            listen('comment', function () {
                if ($('#comment').val().length > 1000) {
                    $('#comment').val($('#comment').val().substring(0, 1000));
                }
                $('#number').text("已经输入" + $('#comment').val().length + "个字符，还可输入" + (1000 - $('#comment').val().length) + "个字符。").append('&nbsp;&nbsp;&nbsp;&nbsp;');
            });
        });
        function listen(id, callback) {
            var obj = document.getElementById(id);
            if (obj.onpropertychange) {
                obj.onpropertychange = callback;
            }
            else {
                obj.oninput = callback;
            }
            obj.onchange = callback;
        }
    </script>
@endsection