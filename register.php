<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <style>
        body{
            background-color: #C7EDCC;
            font-family: "microsoft yahei";
            /*min-width: 800px;*/
        }
        img{
            width: 100%;
            /*height: 462px;*/
        }
        .navbar{
            /*margin-bottom: -10px;*/
        }
        #myppt{
            margin-top: -20px;

        }
        form label:nth-of-type(2){
            display: none;
        }
    </style>
</head>
<body>
    <ul class="nav navbar-nav navbar-right">
        <li><a data-toggle="modal" data-target="#register" href=""><span class="glyphicon glyphicon-user"></span> 注册</a></li>
        <li><a data-toggle="modal" data-target="#login" href=""><span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
    </ul>
    <!-- 注册窗口 -->
    <div id="register" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-title">
                    <h1 class="text-center">注册</h1>
                </div>
                <div class="modal-body">
                    <form class="form-group" action="">
                            <div class="form-group">
                                <label for="">用户名</label>
                                <label class="text-danger" for="">用户名格式不正确！</label>
                                <input class="form-control" name="regUsername" type="text" placeholder="6-10位字母或数字" minlength="6" maxlength="10">
                            </div>
                            <div class="form-group">
                                <label for="">密码</label>
                                <label class="text-danger" for="">密码格式不正确！</label>
                                <input class="form-control" name="regPassword" type="password" placeholder="至少6位字母或数字">
                            </div>
                            <div class="form-group">
                                <label for="">再次输入密码</label>
                                <label class="text-danger" for="">两次密码不一致！</label>
                                <input class="form-control" name="regRepassword" type="password" placeholder="至少6位字母或数字">
                            </div>
                            <div class="form-group">
                                <label for="">邮箱</label>
                                <label class="text-danger" for="">邮箱格式不正确！</label>
                                <input class="form-control" name="regEmail" type="email" placeholder="例如:123@123.com">
                            </div>
                            <button type="reset" class="btn btn-warning pull-left" name="clear">清除</button>
                            <div class="text-right">
                                <button class="btn btn-primary" type="submit">提交</button>
                                <button class="btn btn-danger" data-dismiss="modal">取消</button>
                            </div>
                            <a href="" data-toggle="modal" data-dismiss="modal" data-target="#login">已有账号？点我登录</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- 登录窗口 -->
    <div id="login" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-title">
                    <h1 class="text-center">登录</h1>
                </div>
                <div class="modal-body">
                    <form class="form-group" action="">
                            <div class="form-group">
                                <label for="">用户名</label>
                                <input class="form-control" name="username" type="text" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">密码</label>
                                <input class="form-control" name="password" type="password" placeholder="">
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary" type="submit">登录</button>
                                <button class="btn btn-danger" data-dismiss="modal">取消</button>
                            </div>
                            <a href="" data-toggle="modal" data-dismiss="modal" data-target="#register">还没有账号？点我注册</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
<?php 
    
 ?>
<script>
    // 验证用户名
    $("[name=regUsername]").blur(function(){
        var regUsername = $(this).val();
        if (regUsername.match(/^([a-zA-Z0-9]){6,10}$/)||regUsername=="") {
            $(this).parent().removeClass("has-error");
            $(this).parent().addClass("has-success");
            $(this).prev().hide();
        }else{
            $(this).parent().addClass("has-error");
            $(this).prev().show();
        }
        
    });
    // 验证密码
    $("[name=regPassword]").blur(function(){
        var regPassword = $(this).val();
        if (regPassword.match(/^([a-zA-Z0-9]){6,10}$/)||regPassword=="") {
            $(this).parent().removeClass("has-error");
            $(this).parent().addClass("has-success");
            $(this).prev().hide();
        }else{
            $(this).parent().addClass("has-error");
            $(this).prev().show();
        }
        
    });
    // 验证第二次密码
    $("[name=regRepassword]").blur(function(){
        var regRepassword = $(this).val();
        if (regRepassword == $("[name=regPassword]").val()||regRepassword=="") {
            $(this).parent().removeClass("has-error");
            $(this).parent().addClass("has-success");
            $(this).prev().hide();
        }else{
            $(this).parent().addClass("has-error");
            $(this).prev().show();
        }
    });
    // 验证邮箱
    $("[name=regEmail]").blur(function(){
        var regEmail = $(this).val();
        if (regEmail.match(/^([a-zA-Z0-9_])+\@([a-zA-Z0-9])+\.com$/)||regEmail=="") {
            $(this).parent().removeClass("has-error");
            $(this).parent().addClass("has-success");
            $(this).prev().hide();
        }else{
            $(this).parent().addClass("has-error");
            $(this).prev().show();
        }
    });
    //点击清除后，提示不正确的label隐藏
    $("[name=clear]").click(function(){
        $("#register .text-danger").css({"display":"none"});
        // $("#register input").blur();
    });
    $("[type=submit]").click(function(){
        // alert(132);
    });
</script>
</html>