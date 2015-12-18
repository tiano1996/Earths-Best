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
                            @foreach($user->article as $article)
                                <div class="post">
                                    <div class="post-head">
                                        <a href="/article/{{$article->id}}"><span class="fa fa-share-alt"></span>
                                            {{$article->id.'.'.$article->title}}</a>

                                        <div class="edit-btn">
                                            <a href="javascript:void(0)">操作</a>

                                            <div class="edit-post">
                                                <a href="{{route('article.show',[$article->id])}}">查看</a>
                                                <a href="{{route('user.article.edit',[$article->id])}}">编辑</a>
                                                <form action="{{route('user.article.destroy',[$article->id])}}"
                                                      method="POST">
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
                    <div class="page-ctrl">
                    </div>
                </div>
            </div>
            <!-- end 左侧容器 -->
            <!-- 右侧容器 -->
            <div class="col-md-3 side-base">
                <!-- 个人信息 面板 -->
                <div class="bg-info">
                    <div class="info-base">
                        <div class="info-title">
                            <i class="fa fa-user"></i>&nbsp;个人中心
                        </div>
                        <div class="profile">
                            <img src="http://img0.bdstatic.com/img/image/shouye/qdmmx06.jpg" alt="">
                            <a href="#" class="user-name">{{$user->username}}</a>
                            <span class="fa fa-male"></span><span class="fa fa-female"></span>
                            <span class="jobs">前端攻城狮</span>
                            <a href="#">{{count($user->article)}}</a>&nbsp;文章&nbsp;&#124;&nbsp;<a href="#">{{$count}}</a>&nbsp;评论
                        </div>
                        <dl class="profile-info">
                            <dt>登陆邮箱</dt><dd>{{$user->email}}</dd>
                            <dt>注册时间</dt><dd>{{$user->created_at}}</dd>
                            <dt>最后登录</dt><dd>{{$user->updated_at}}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
