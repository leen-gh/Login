<?php 
    if(isset($_POST["sub"])){

        $uid = $_REQUEST["uid"];
        $pwd = $_REQUEST["pwd"];
     
        //Instantiate Signupcontr class
        include "../classes/dbh.classes.php";
        include "../classes/login.classes.php";
        include "../classes/login-contr.classes.php";

        $login = new LoginContr($uid, $pwd);

        //Running error handlers and user sign up
        $login->loginUser();

        //Going to back to frontpage 
        header("location: ../index.php?error=none");


    }