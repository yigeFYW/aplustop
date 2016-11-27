<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A+微信|最好的微信平台</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/assets/css/animate.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="/assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <style>
        body{
            font-family:'微软雅黑',sans-serif;
            background-image:url(/assets/img/login_bgx.gif);
        }
        #include{
            background: #fff;
            padding:0 40px 20px 40px;
            border-radius: 5px;
            -webkit-box-shadow: 2px 1px 5px #aaa;
            -moz-box-shadow: 2px 1px 5px #aaa;
            box-shadow: 2px 1px 5px #aaa;
        }
        #include .tooltip-inner{
            background-color: rgba(255,144,0,0.4);
        }
        .tooltip.bottom .tooltip-arrow{
            border-bottom-color: rgba(255,144,0,0.4);
        }
    </style>
</head>

<body class="gray-bg">
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div id="include">
        <div>
            <h1 class="logo-name" style="margin-top:0px;"><img src="/assets/img/A+.png" alt=""></h1>
        </div>
        <h4>欢迎使用A+微信托管平台</h4>
        <p>本平台仅供测试使用!<br>如有BUG,欢迎来信指正!</p>
        <form class="m-t" role="form" action="{{url('login.html')}}" method="post">
            {!! csrf_field() !!}
            <div class="form-group">
                <input type="text" class="form-control tool" name="email" placeholder="Email" data-toggle="tooltip" data-placement="bottom" title="请填入注册的邮箱">
            </div>
            <div class="form-group">
                <input type="password" class="form-control tool" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">登录</button>
            <a href="#"><small>忘记密码?</small></a>
            <p class="text-muted text-center"><small>没有账号?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="{{url('register.html')}}">创建一个账号</a>
        </form>
        <p class="m-t"> <small>技术支持: <a href="http://blog.aplustop.cn" target="_blank">Mr.Adam</a>&nbsp;&nbsp;&copy; 2016-2017</small> </p>
        <p class="m-t">来信请寄 <span style="color:#ff9000;">1015517471@qq.com</span></p>
    </div>
</div>
<br>
<!-- Mainly scripts -->
<script src="/assets/js/jquery-2.1.1.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<!-- Toastr script -->
<script src="/assets/js/plugins/toastr/toastr.min.js"></script>
</body>
<script>
    $('.tool').tooltip();
    @if(session("warning"))
            toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "preventDuplicates": false,
        "positionClass": "toast-bottom-center",
        "onclick": null,
        "showDuration": "400",
        "hideDuration": "1000",
        "timeOut": "2000",
        "extendedTimeOut": "800",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    toastr.warning("{{session("warning")}}");
    @endif
</script>
</html>
