@extends('_layouts.index')
@section('style')
    <style>
        .box {
            float: left;
            padding: 60px 50px 40px 50px;
            background: #fff;
            border-radius: 10px;
        }

        .title {
            float: left;
            line-height: 46px;
            font-size: 34px;
            letter-spacing: 2px;
            color: #ED2553;
            position: relative;
        }

        .title:before {
            content: "";
            width: 5px;
            height: 100%;
            position: absolute;
            top: 0;
            left: -50px;
            background: #ED2553;
        }

        .input,
        .input label,
        .input input,
        .input .spin,
        .button,
        .button button .button.login button i.fa,
        .button.login button {
            transition: 300ms cubic-bezier(.4, 0, .2, 1);
            -webkit-transition: 300ms cubic-bezier(.4, 0, .2, 1);
            -ms-transition: 300ms cubic-bezier(.4, 0, .2, 1);
        }

        .input,
        .input label,
        .input input,
        .input .spin,
        .button,
        .button button {
            width: 100%;
            float: left;
        }

        .input,
        .button {
            margin-top: 30px;
            height: 70px;
        }

        .input,
        .input input,
        .button,
        .button button {
            position: relative;
        }

        .input input {
            height: 60px;
            top: 10px;
            border: none;
            background: transparent;
        }

        .input input,
        .input label,
        .button button {
            font-family: 'microsoft yahei', 'Roboto', sans-serif;
            font-size: 24px;
            color: rgba(0, 0, 0, 0.8);
            font-weight: 300;
        }

        .input:before,
        .input .spin {
            width: 100%;
            height: 1px;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .input:before {
            content: "";
            background: rgba(0, 0, 0, 0.1);
            z-index: 3;
        }

        .input .spin {
            background: #ED2553;
            z-index: 4;
            width: 0;
        }

        .input label {
            position: absolute;
            top: 10px;
            left: 0;
            z-index: 2;
            cursor: pointer;
            line-height: 60px;
        }

        .button.login {
            width: 60%;
            left: 20%;
        }

        .button.login button,
        .button button {
            width: 100%;
            line-height: 64px;
            left: 0;
            background-color: transparent;
            border: 3px solid rgba(0, 0, 0, 0.1);
            font-weight: 900;
            font-size: 18px;
            color: rgba(0, 0, 0, 0.2);
        }

        .button.login {
            margin-top: 30px;
        }

        .button {
            margin-top: 20px;
        }

        .button button {
            background-color: #fff;
            color: #ED2553;
            border: none;
        }

        .button.login button .active {
            border: 3px solid transparent;
            color: #fff !important;
        }

        .button.login button.active span {
            opacity: 0;
            transform: scale(0);
            -webkit-transform: scale(0);
            -ms-transform: scale(0);
        }

        .button.login button.active i.fa {
            opacity: 1;
            transform: scale(1) rotate(-0deg);
            -webkit-transform: scale(1) rotate(-0deg);
            -ms-transform: scale(1) rotate(-0deg);
        }

        .button.login button i.fa {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            line-height: 60px;
            transform: scale(0) rotate(-45deg);
            -webkit-transform: scale(0) rotate(-45deg);
            -ms-transform: scale(0) rotate(-45deg);
        }

        .button.login button:hover {
            color: #ED2553;
            border-color: #ED2553;
        }

        .button {
            margin: 40px 0;
            overflow: hidden;
            z-index: 2;
        }

        .button button {
            cursor: pointer;
            position: relative;
            z-index: 2;
        }

        .pass-forgot {
            width: 100%;
            float: left;
            text-align: center;
            color: rgba(0, 0, 0, 0.4);
            font-size: 18px;
        }

        .box {
            max-width: 560px;
            margin-left: 50%;
            transform: translate(-50%, 5%);
        }

        .click-efect {
            position: absolute;
            top: 0;
            left: 0;
            background: #ED2553;
            border-radius: 50%;
        }

        *,
        *:after,
        *::before {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            text-decoration: none;
            list-style-type: none;
            outline: none;
        }
    </style>
@endsection
@section('content')
    <div class="container text-center">
        <form action="/auth/login" method="post">
            <div class="box text-left">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="title">登录</div>

                <div class="input">
                    <label for="name">用户名</label>
                    <input type="text" name="username" id="name" value="{{ old('username') }}" autocomplete="off">
                    <span class="spin"></span>
                </div>

                <div class="input">
                    <label for="pass">密码</label>
                    <input type="password" name="password" id="pass" autocomplete="off">
                    <span class="spin"></span>
                </div>

                <div class="button login">
                    <button><span>登录</span> <i class="fa fa-check"></i></button>
                </div>
                <a href="/password/email" class="pass-forgot">忘记密码?</a>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
    <script>
        $(function () {
            if ($('#name').val() != '') {
                $('#name').prev().css({
                    "line-height": "18px",
                    "font-size": "18px",
                    "font-weight": "100",
                    "top": "0px"
                });
                $('#name').next().css({
                    "width": "100%"
                });
            }
            $('#name').onlyNumAlpha();
            $("#name,#pass").focus(function () {
                $(this).prev().css({
                    "line-height": "18px",
                    "font-size": "18px",
                    "font-weight": "100",
                    "top": "0px"
                });
                $(this).next().css({
                    "width": "100%"
                });
            }).blur(function () {
                if ($(this).val().trim() == "") {
                    $(this).next().css({
                        "width": "0px"
                    });
                    $(this).prev().css({
                        "line-height": "60px",
                        "font-size": "24px",
                        "font-weight": "300",
                        "top": "10px"
                    })
                }
            });
            $(".login").click(function (e) {
                var pX = e.pageX,
                        pY = e.pageY,
                        oX = parseInt($(this).offset().left),
                        oY = parseInt($(this).offset().top);
                $(this).append('<span class="click-efect x-' + oX + ' y-' + oY + '" style="margin-left:' + (pX - oX) + 'px;margin-top:' + (pY - oY) + 'px;"></span>')
                $('.x-' + oX + '.y-' + oY + '').animate({
                    "width": "500px",
                    "height": "500px",
                    "top": "-250px",
                    "left": "-250px"
                }, 600);
                $("button", this).addClass('active');
                $('form').submit();
            })
        });
        $.fn.onlyNumAlpha = function () {
            $(this).keypress(function (event) {
                var eventObj = event || e;
                var keyCode = eventObj.keyCode || eventObj.which;
                if ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122))
                    return true;
                else
                    return false;
            }).focus(function () {
                this.style.imeMode = 'disabled';
            }).bind("paste", function () {
                var clipboard = window.clipboardData.getData("Text");
                if (/^(\d|[a-zA-Z])+$/.test(clipboard))
                    return true;
                else
                    return false;
            });
        };
    </script>
@endsection
