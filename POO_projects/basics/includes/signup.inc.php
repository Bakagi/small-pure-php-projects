<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once '../classes/dbs.php';
    require_once '../classes/signup.php';

    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    
    $signup = new signup($username, $pwd);//creating an object of the signup class
    $signup->insertuser();//calling the insertuser method

}