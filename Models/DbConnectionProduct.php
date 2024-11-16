<?php

    abstract class dbConnection{
        
        static   $pdo;

        private function getConnection(){
            $dsn = "mysql:host=localhost;dbname=monprojet";
            $user = "root";
            $pwd = '';
            try{
                self::$pdo = new PDO($dsn,$user,$pwd);
            }catch (PDOException $e){
                echo $e->getMessage();
                die(); 
            }
        }
        protected function getPdo(){
        if(self::$pdo==null){
        $this->getConnection();
        }
        return self::$pdo;
        }

    }
?>