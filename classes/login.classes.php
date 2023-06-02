<?php 

    class Login extends Dbh {

        protected function getUser($uid, $pwd){

            $sql = "SELECT user_pwd FROM users WHERE user_uid = ? OR user_email = ?; ";
            $stmt = $this->connect()->prepare($sql);
            
         

            if(!$stmt->execute(array($uid, $pwd))){
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }
            $pwdhash = $stmt->fetchAll();
            $checkpwd = password_verify($pwd, $pwdhash[0]["user_pwd"]);
            if($checkpwd == false){
                header("location: ../index.php?error=wrongpassword");
                exit();
            }elseif($checkpwd == true){
                $sql = "SELECT * FROM users WHERE user_uid = ? OR user_email = ? AND user_pwd = ?; ";
                $stmt = $this->connect()->prepare($sql);

                if(!$stmt->execute(array($uid, $uid, $pwd))){
                    $stmt = null;
                    header("location: ../index.php?error=stmtfailed");
                    exit();
                }
                if($stmt->rowCount() == 0){
                    $stmt = null;
                    header("location: ../index.php?error=usernotfound");
                    exit();
                }
                $user = $stmt->fetchAll();

                session_start();

                $_SESSION["userid"] = $user[0]["user_id"];
                $_SESSION["useruid"] = $user[0]["user_uid"];

            }

            $stmt = null;

        }
        

        protected function checkUser($uid, $email){
            $sql = "SELECT user_uid FROM users WHERE user_uid = ? OR user_email = ? ";
            $stmt = $this->connect()->prepare($sql);

            if(!$stmt->execute(array($uid, $email))){
                $stmt = null;
                // this function will send the u back to front page with error m
                header("location: ../index.php?error=stmtfailed");
                //in this way we exit the entier script
                exit();
            }
            $resultCh;
            if($stmt->rowCount() > 0){
                $resultCh = false;
            }else{
                $resultCh=true;
            }
            return $resultCh;
        }
    }

    