<?php 

    class Signup extends Dbh {

        protected function setUser($uid, $pwd, $email){

            $sql = "INSERT INTO users ( user_uid, user_pwd, user_email) VALUES (?, ?, ?); ";
            $stmt = $this->connect()->prepare($sql);
            
            //this for security of the password first we hash it 
            //then we will unhash it when we login the user 
            $hashpwd = password_hash($pwd, PASSWORD_DEFAULT);

            if(!$stmt->execute(array($uid, $hashpwd, $email))){
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }
            // we should make sure to end of ur stmt
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

    