<?php
class Database {

    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'userdb';
    private $connection;

    public function createdb(){
        //chek connection
        try {
            $this->connection = new PDO("mysql:host=$this->host", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo "Connection Failed: " . $e->getMessage();die;
        }
        //create database
        /*try{
            $sql = "CREATE DATABASE userdb DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci";
            $this->connection->exec($sql);
            echo "Database created successfully";
        } catch(PDOException $e){
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }*/
    }
    public function createtbl(){
        //chek connection
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo "Connection Failed: " . $e->getMessage();die;
        }
        //create table
        try{
            $sql = "CREATE TABLE usertbl(
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                fullname TEXT(30) NOT NULL,
                ncode BIGINT(30) NOT NULL,
                phone BIGINT(70) NOT NULL UNIQUE,
                password VARCHAR(30) NOT NULL
            )";    
            $this->connection->exec($sql);
            echo "Table created successfully.";
        } catch(PDOException $e){
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
    }
}

?>
