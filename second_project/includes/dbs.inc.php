<?php
 //database connection
 $dsn = "mysql:host=localhost;dbname=test";
 $db_user = "root";
 $db_pass = "";
 //create a PDO connection
 try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    //set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
 }
 //if the connection fails
 catch( PDOException $e){
    echo "Connection failed: ". $e->getMessage();
 };