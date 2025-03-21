<?php 

declare(strict_types=1);
  //check if the password empty function
function is_username_password_empty(string $pwd, string $username){
    if (empty( $pwd)  || empty($username)) {
        return true;
    } else {
        return false;        
    }
}
// check if the username wrong function
function is_username_wrong(bool|array $result){
    if (!$result) {
        return true;
    } else {
        return false;        
    }
}
// check if the password wrong function 
function is_password_wrong(string $pwd, string $hpwd){
    if (!password_verify($pwd, $hpwd)) {
        return true;
    } else {
        return false;        
    }
}

