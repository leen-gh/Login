<?php
// we have to add this in each page so we could check the session
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- MAKE THIS IOS COMPATIBLE 
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="La Pizzeria Restaurant">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(  )?>/img/apple-touch-icon.jpg"/>
    -->
        
    <!-- MAKE THIS Android COMPATIBLE -->
    <!-- MAKE THIS code make the tab red on mobile phone 
    <meta name="theme-color" content="#a61206">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="La Pizzeria Restaurant">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(  ) ?>/img/n icon.png" sizes="192x192"/>
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(  ) ?>/img/n icon.png"/>
    -->

    <title>Login System</title>
    <style>
        <?php include "style.css" ?>
    </style>
</head>

<body>
    <header class="main-head">
        <div class="logo">
            <h3>Heelo.Site</h3>
        </div>
        <nav>
            <ul class="menu-member">
                <?php 
                    if(isset($_SESSION["userid"])){

                    
                ?>
                    <li><a href="#"><?php echo $_SESSION["useruid"];?></a></li>
                    <li><a href="includes/logout.inc.php" class="header-login">LOGOUT</a></li>
                <?php 
                    }else {
                ?>
                        <li><a href="#">SIGN UP</a></li>
                        <li><a href="#"class="header-login">LOGIN</a></li>
                <?php
                    }
                ?>  
            </ul>
        </nav>
    </header>
    <section class="index-login">
        <div class="wrap">
            <div class="signup">
                <h3>SIGN UP</h3>
                <p>Dont have an account yet? Sign up here!</p>
                <form action="/login/includes/signup.inc.php" method="post">
                    <input type="text" name="uid" placeholder="UserName">
                    <input type="password" name="pwd" placeholder="Enter Your Password">
                    <input type="password" name="pwdre" placeholder="Repeat Your Password">
                    <input type="email" name="email" placeholder="E-mail">
                    <br>
                    <button type="submit" name="sub">SIGN UP</button>
                </form>
            </div>
            <div class="login">
                <h3>Login</h3>
                <form action="/login/includes/login.inc.php" method="post">
                    <input type="text" name="uid" placeholder="UserName">
                    <input type="password" name="pwd" placeholder="Enter Your Password">
                    <br>
                    <button type="submit" name="sub">LOGIN</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>