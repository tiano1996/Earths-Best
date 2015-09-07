@extends('_layouts.index')
@section('content')
    <div class="container post-page">
        <div class="row">
            <!-- 左侧容器 main-base -->
            <div class="col-md-9 main-base">
                <div class="bg-info">
                    <div class="info-base main-info-base">
                        <div class="post">
                            <h3>Awesome Node.js development tools for 2015 tools for 2015</h3>
                            <div class="post-footer post-info-footer">
                                <i class="fa fa-edit"></i>&nbsp;<span>8-25 17:30</span>
                                <i class="fa fa-reply"></i>&nbsp;<span>8-25 18:00</span>
                                <i class="fa fa-eye"></i><span> 100</span>
                                <i class="fa fa-comment"></i><span> 2</span>
                                <a class="post-badge" href="#">angularJS</a>
                                <a class="post-badge" href="#">Bootstrap</a>
                                <a class="post-badge" href="#">angularJS</a>
                                <a class="post-badge" href="#">Bootstrap</a>
                                <a class="post-badge" href="#">angularJS</a>
                                <a class="post-badge" href="#">Bootstrap</a>
                            </div>
                            <div class="post-content">
                                <p>
                                    With the arrival of Node.js, creating a website in JavaScript is very easy and
                                    cost-effective. This framework brings a massive changeover in the web application
                                    development with the advanced push innovation instead of using old web sockets. With
                                    these
                                    beneficial aspects, [Node.js][2] is gaining popularity among web developers who
                                    aspire
                                    to develop their next website in this framework. …
                                </p>

                                <p>
                                    With the arrival of Node.js, creating a website in JavaScript is very easy and
                                    cost-effective. This framework brings a massive changeover in the web application
                                    development with the advanced push innovation instead of using old web sockets. With
                                    these
                                    beneficial aspects, [Node.js][2] is gaining popularity among web developers who
                                    aspire
                                    to develop their next website in this framework. …
                                </p>

                                <p>
                                    With the arrival of Node.js, creating a website in JavaScript is very easy and
                                    cost-effective. This framework brings a massive changeover in the web application
                                    development with the advanced push innovation instead of using old web sockets. With
                                    these
                                    beneficial aspects, [Node.js][2] is gaining popularity among web developers who
                                    aspire
                                    to develop their next website in this framework. …
                                </p>

                                <p>
                                    With the arrival of Node.js, creating a website in JavaScript is very easy and
                                    cost-effective. This framework brings a massive changeover in the web application
                                    development with the advanced push innovation instead of using old web sockets. With
                                    these
                                    beneficial aspects, [Node.js][2] is gaining popularity among web developers who
                                    aspire
                                    to develop their next website in this framework. …
                                </p>

                                <p>
                                    With the arrival of Node.js, creating a website in JavaScript is very easy and
                                    cost-effective. This framework brings a massive changeover in the web application
                                    development with the advanced push innovation instead of using old web sockets. With
                                    these
                                    beneficial aspects, [Node.js][2] is gaining popularity among web developers who
                                    aspire
                                    to develop their next website in this framework. …
                                </p>
                            </div>
                            <div class="post-footer">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-info comment-panel">
                    <h4>评论：7 Excellent Tutorials to learn angularJs in an innovative way</h4>
                    <form action="#" method="post">
                        <textarea name="comment" rows="5" cols="116"></textarea>
                        <input type="submit" class="btn btn-success" value="发布评论"/>
                        <a href="#" class="btn btn-warning">取消</a>
							<span class="pull-right">已经输入3个字符，还可输入997个字符。&nbsp;&nbsp;&nbsp;&nbsp;
							</span>
                    </form>
                    <div class="comment-list clearfix">
                        <div class="comment-body row">
                            <div class="col-md-2">
                                <img src="http://img0.bdstatic.com/img/image/shouye/qdmmx06.jpg"/>
                            </div>
                            <div class="col-md-10">
                                <h5> 评论：7 Excellent Tutorials to learn angularJs in an innovative way</h5>
                                <pre>With the arrival of Node.js, creating a website in JavaScript is very easy and cost-effective. </pre>
                                <span>popohum 发表于2015年8月26日 22:21:39</span>
                                <a href="#" class="pull-right">回复</a>
                            </div>
                        </div>
                    </div>
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