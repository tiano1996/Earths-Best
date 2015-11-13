@extends('_layouts.index')
<style>

</style>
@section('content')
    <div class="container">
        <div class="row">
            <!-- 左侧容器 main-base -->
            <div class="col-md-12 main-base">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="bg-info">
                    <div class="panel panel-success">
                        <div class="panel-heading" style="background-color: #d6e9c6">
                            <h4 class="panel-title">通知信息：</h4>
                        </div>
                        <div class="panel-body">
                            <p>
                                {{$msg}}
                            </p>
                            <div style="padding: 1em;">
                                <a href="/" style="color: #5cb85c;"><span class="fa fa-chevron-left"></span>&nbsp;返回首页</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end 左侧容器 -->
        </div>
    </div>
@endsection
