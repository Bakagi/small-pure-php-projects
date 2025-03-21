<?php 

declare(strict_types=1);

function get_user (object $pdo , string $username){
       //check if the username is already taken
    $query = "SELECT * FROM users WHERE username = :username"; //create the query
    $stmt = $pdo->prepare($query); //prepare the query
    $stmt->bindParam(':username', $username); //bind the parameters
    $stmt->execute(); //execute the query
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC); //fetch the result
    return $result; //return the result
}