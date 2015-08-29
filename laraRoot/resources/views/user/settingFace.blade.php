@extends('_layouts.index')
@section('content')
    <div class="container">
        <div class="row">
            <!-- 左侧容器 main-base -->
            <div class="col-md-9 main-base">
                <div class="bg-info">
                    <div class="info-base setitng-info-base">
                        <div class="info-title">
                            <i class="fa fa-gear"></i>&nbsp;设置 - 修改密码
                        </div>
                        <form class="row" action="" method="post">
                            <div class="col-md-5 col-md-offset-2">
                                <div class="user-face">
                                    当前头像
                                    <img alt="" src="http://cdn.duitang.com/uploads/item/201409/26/20140926213444_jiuXB.thumb.200_0.jpeg">
                                </div>
                                <a class="file-sele" id="fileSelect" href="javascript:void(0)">选择图片</a>
                                <span class="img-note">请选择正方形图片，文件不得大于200kb</span>
                                <input type="submit" class="btn btn-success" value="保存">
                                <input type="button" class="btn" value="取消">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end 左侧容器 -->
            <!-- 右侧容器 -->
            <div class="col-md-3 side-base">
                @include('user.userInfo')
                @include('user.setting')
            </div>
            <!-- end 右侧容器 -->
        </div>
    </div>
    <script>
        // 选择上传图片按钮
        $(document).ready(function() {
            $('#fileSelect').on('click',function(){
                $file = $('<input type="file" name="face">');
                $file.trigger('click');
                $file.change(function() {
                    alert($(this).val());
                });
            });
        });
    </script>
@endsection


