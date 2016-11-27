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
            <h4>注册</h4>
        </div>
        <h4>欢迎使用A+微信托管平台</h4>
        <p>本平台仅供测试使用!<br>如有BUG,欢迎来信指正!</p>

        <form class="m-t" role="form" action="{{url('register.html')}}" method="post" onsubmit="return checkSubmit();">
            {!! csrf_field() !!}
            <div class="form-group">
                <input type="text" class="form-control tool" name="name" placeholder="账号昵称" data-toggle="tooltip" data-placement="bottom" title="请填写您的账号昵称">
            </div>
            <div class="form-group">
                <input type="text" class="form-control tool" name="email" placeholder="邮箱" data-toggle="tooltip" data-placement="bottom" title="请填入正确可用的邮箱">
            </div>
            <div class="form-group">
                <input type="password" class="form-control tool" name="password" placeholder="密码" data-toggle="tooltip" data-placement="bottom" title="密码不少于6位,请尽量复杂">
            </div>
            <div class="form-group">
                <input type="password" class="form-control tool" name="password_confirmation" placeholder="确认密码">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">注册</button>
            <a class="btn btn-sm btn-white btn-block" href="{{url('login.html')}}">已有账号? 前去登录</a>
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
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "preventDuplicates": false,
        "positionClass": "toast-bottom-center",
        "onclick": null,
        "showDuration": "800",
        "hideDuration": "1000",
        "timeOut": "2000",
        "extendedTimeOut": "800",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    $('.tool').tooltip();
    var test = false;
    var abs = false;
    var mail_patt = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
    function checkSubmit(){
        var mail = $("input[name='email']").val();
        var name = $("input[name='name']").val();
        var pwd1 = $("input[name='password']").val();
        var pwd2 = $("input[name='password_confirmation']").val();
        //判断昵称是否为空
        if (name.replace(/(^\s*)/g, "").length ==0){
            toastr.warning("请输入昵称!");
            return false;
        }
        //判断邮箱格式
        if(!mail_patt.test(mail)){
            toastr.warning("邮件格式不正确,请填入正确的邮箱!");
            return false;
        }
        //判断密码长度
        if(pwd1.length < 6){
            toastr.warning("密码长度不少于6位!");
            return false;
        }
        //判断两个密码是否一样
        if(pwd1 !== pwd2){
            toastr.warning("两次输入的密码不同!");
            return false;
        }
        //判断邮箱是否注册过
        if(!test){
            toastr.warning("该邮箱已被注册!请换个邮箱注册!");
            return false;
        }
    }
    $('input[name=email]').change(function(){
        var mail = $(this).val();
        var data = {
            _token:$("input[name='_token']").val(),
            email:mail
        };
        if(mail_patt.test(mail)){
            $.post('{{url('check/check_reg.html')}}',data,function(res){
                if(res.error == 1){
                    toastr.warning("该邮箱已被注册!");
                    test = false;
                }else if(res.error == 0){
                    test = true;
                    toastr.success("该邮箱可以注册!");
                }
            });
        }
    });
    @if(session('warning'))
        toastr.warning("{{session('warning')}}");
    @endif
</script>
</html>
