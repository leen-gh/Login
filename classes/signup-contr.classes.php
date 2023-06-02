<?php
    class SignupContr extends Signup {

        private $uid;
        private $pwd;
        private $pwdre;
        private $email;

        // these data in this const we grap it for the users 
        //its not the same as the prop
        public function __construct($uid, $pwd, $pwdre, $email){
            $this->uid =$uid;
            $this->pwd =$pwd;
            $this->pwdre =$pwdre;
            $this->email =$email;
        }

        public function signupUser(){
            if($this->emptyInput() == false){
                header("location: ../index.php?error=emptyinput");
                exit();
            }
            if($this->invalidUid() == false){
                header("location: ../index.php?error=invalidUid");
                exit();
            }
            if($this->invalidEmail() == false){
                header("location: ../index.php?error=invalidEmail");
                exit();
            }
            if($this->pwdMatch() == false){
                header("location: ../index.php?error=passworddoesnotmatch");
                exit();
            }
            if($this->uidTaken() == false){
                header("location: ../index.php?error=uidTaken");
                exit();
            }

            $this->setUser($this->uid, $this->pwd, $this->email);

        }

        private function emptyInput(){
            $result;

            if(empty($this->uid) || empty($this->pwd) || empty($this->pwdre) || empty($this->email)){
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        } 

        private function invalidUid(){
            $result;

            if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)){
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        } 

        private function invalidEmail(){
            $result;

            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        } 

        private function pwdMatch(){
            $result;

            if($this->pwd !== $this->pwdre){
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        } 

        // we first create the checkuser method
        private function uidTaken(){
            $result;

            if(!$this->checkUser($this->uid, $this->email)){
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        } 
    }