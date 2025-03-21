<?php 

class signup extends dbs{
    private $username;
    private $pwd;
    
    public function __construct($username, $pwd){
        $this->username = $username;
        $this->pwd = $pwd;
    }
    
    public function insertuser(){
        $query = "INSERT INTO users (username, pwd) VALUES (:username, :pwd)";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':pwd', $this->pwd);
        $stmt->execute();
        
    }
        
    
}