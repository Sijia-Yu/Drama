<?php session_start(); ?>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8" />
        <title>Login and Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <header>
                <h1><span>Welcome to    </span>  Drama话剧推荐系统</h1>
            </header>
            <section>               
                <div id="container_demo" style="margin-top:50px">
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="auth_login.php" method="post" autocomplete="on"> 
                                <h1>登录</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" >用户名</label>
                                    <input id="username" name="username" required="required" type="text" placeholder="my username" value="yuyu"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> 密码 </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="my password" value="yuyu"/> 
                                </p>
                                <p class="login button"> 
                                    <input type="submit" value="Log in" /> 
                                </p>
                                <p class="change_link">
                                    <a href="#toregister" class="to_register">注册</a>
                                </p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="auth_regist.php" method="post" autocomplete="on"> 
                                <h1> 注册 </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">用户名</label>
                                    <input id="username" name="username" required="required" type="text" placeholder="my username" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > 邮箱</label>
                                    <input id="email" name="email" required="required" type="email" placeholder="mymail@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">密码 </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="my password"/>
                                </p>
                                <p class="signin button"> 
                                    <input type="submit" value="Sign up"/> 
                                </p>
                                <p class="change_link">  
                                    <a href="#tologin" class="to_register"> 登录 </a>
                                </p>

                            </form>
                        </div>
                    </div>
                </div>  
            </section>
        </div>
</body>
</html>