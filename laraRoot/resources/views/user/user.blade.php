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
                                <a href="/user/create_post" class="btn btn-success">发表新文章</a></li>
                        </ul>

                        <div class="post-list">
                            @for($i=0;$i<5;$i++)
                                <div class="post">
                                    <div class="post-head">
                                        <a href="/post/{{$i+1}}"><span class="fa fa-share-alt"></span>
                                            {{$i+1}}.Awesome Node.js development tools for 2015 tools for 2015</a>

                                        <div class="edit-btn">
                                            <a href="javascript:void(0)">操作</a>

                                            <div class="edit-post">
                                                <a href="#">查看</a>
                                                <a href="#">编辑</a>
                                                <a href="#">删除</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-content">
                                        <p>
                                            With the arrival of Node.js, creating a website in JavaScript is very easy
                                            and cost-effective. This framework brings a massive changeover in the web
                                            application development with the advanced push innovation instead of using
                                            old web sockets. With these beneficial aspects, [Node.js][2] is gaining
                                            popularity among web developers who aspire to develop their next website
                                            in this framework. …
                                        </p>
                                    </div>
                                    <div class="post-footer">
                                        <i class="fa fa-user"></i>&nbsp;<a href="#">popohum</a>
                                        <i class="fa fa-edit"></i>&nbsp;<span>8-25 17:30</span>
                                        <i class="fa fa-reply"></i>&nbsp;<span>8-25 18:00</span>
                                        <i class="fa fa-commenting"></i>&nbsp;<span>58</span>
                                        <a class="post-badge" href="#">angularJS</a>
                                        <a class="post-badge" href="#">Bootstrap</a>
                                        <a class="post-badge" href="#">angularJS</a>
                                        <a class="post-badge" href="#">Bootstrap</a>
                                        <a class="post-badge" href="#">angularJS</a>
                                        <a class="post-badge" href="#">Bootstrap</a>
                                    </div>
                                </div>
                            @endfor
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
