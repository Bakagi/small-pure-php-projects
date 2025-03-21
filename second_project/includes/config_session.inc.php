<?php
//start the session

ini_set('session.use_strict_mode', 1);
ini_set('session.use_only_cookies', 1);
//set the cookie parameters
session_set_cookie_params([
    'lifetime' => 1800,
    'path' => '/',
    'domain' => 'localhost',
    'httponly' => true,
    'secure' => true
]);

session_start();

if(isset($_SESSION['user_id'])){
    
    //check if the session is new
    if (!isset($_SESSION['last_regenerate'])) {
        sess_reg_loggedin();
        } else {
        $interval = 60 * 30;
        //check if the session has expired
        if ( time() - $_SESSION['last_regenerate'] >= $interval) {
        sess_reg_loggedin();
        }
    }
} else {

    //check if the session is new
    if (!isset($_SESSION['last_regenerate'])) {
    sess_reg();
    } else {
    $interval = 60 * 30;
    //check if the session has expired
    if ( time() - $_SESSION['last_regenerate'] >= $interval) {
    sess_reg();
    }
};
}

function sess_reg(){
    //regenerate the session id
    session_regenerate_id(true);
    //set the session variable
    $_SESSION['last_regenerate'] = time();
};

function sess_reg_loggedin(){
    //regenerate the session id
    session_regenerate_id(true);
    $userid = $_SESSION['user_id'];
    //create the session id
    $newsessionid = session_create_id();  //create the session id
    $sessionid = $newsessionid . '_'. $userid; 
    session_id($sessionid); //set the session id

    //set the session variable
    $_SESSION['last_regenerate'] = time();
};
?>