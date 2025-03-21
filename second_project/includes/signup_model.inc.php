<?php 

declare(strict_types=1);
//ERROR HANDLING
function get_username(object $pdo , string $username ){
    //check if the username is already taken
    $query = "SELECT username FROM users WHERE username = :username"; //create the query
    $stmt = $pdo->prepare($query); //prepare the query
    $stmt->bindParam(':username', $username); //bind the parameters
    $stmt->execute(); //execute the query
    $result = $stmt->fetch(PDO::FETCH_ASSOC); //fetch the result
    return $result; //return the result
};
//ERROR HANDLING
function get_email(object $pdo , string $email ){
    //check if the email is already taken
    $query = "SELECT email FROM users WHERE email = :email"; //create the query
    $stmt = $pdo->prepare($query); //prepare the query
    $stmt->bindParam(':email', $email); //bind the parameters
    $stmt->execute(); //execute the query
    $result = $stmt->fetch(PDO::FETCH_ASSOC); //fetch the result
    return $result; //return the result
};
//User registration
function set_user (object $pdo , string $username, string $email, string $pwd) {
    //insert the user into the database
    $query = "INSERT INTO users (username, email, pwd) VALUES (:username, :email, :pwd)"; //create the query
    $stmt = $pdo->prepare($query); //prepare the query
    
    $options = ['cost' => 12]; //set the cost of the encryption
    $hpwd = password_hash($pwd, PASSWORD_BCRYPT, $options); //encrypt the password 
    
    $stmt->bindParam(':username', $username); //bind the 
    $stmt->bindParam(':email', $email); //bind the
    $stmt->bindParam(':pwd', $hpwd); //bind the
    $stmt->execute(); //execute the query


}