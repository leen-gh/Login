<?php 
    if(isset($_POST["sub"])){

        $uid = $_REQUEST["uid"];
        $pwd = $_REQUEST["pwd"];
        $pwdre = $_REQUEST["pwdre"];
        $email = $_REQUEST["email"];

        //Instantiate Signupcontr class
        include "../classes/dbh.classes.php";
        include "../classes/signup.classes.php";
        include "../classes/signup-contr.classes.php";

        $signup = new SignupContr($uid, $pwd, $pwdre, $email);

        //Running error handlers and user sign up
        $signup->signupUser();

        //Going to back to frontpage 
        header("location: ../index.php?error=none");


    }