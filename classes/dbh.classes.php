<?php
/* we have two type of connect to DB 
* we can use PDO or mysqli  
*/
    
    class Dbh {
        private $host = "localhost";
        private $user = "root";
        private $pwd = "root";
        private $dbname = "login";

        protected function connect(){
            
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=UTF8";
            // creating PDO CONNECTION
            try {
                $pdo = new PDO($dsn, $this->user, $this->pwd );
                if ($pdo){
                    echo "Connected! <br>";
                }
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                return $pdo;
            }catch(PDOException $e){
                echo $e->getMessage();
            }

        }
    }