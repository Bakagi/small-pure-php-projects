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
//check if the session is new
if (!isset($_SESSION['last_regenerate'])) {
    //regenerate the session id
    session_regenerate_id(true);
    //set the session variable
    $_SESSION['last_regenerate'] = time();
} else {
    $interval = 60 * 30;
    //check if the session has expired
    if ( time() - $_SESSION['last_regenerate'] >= $interval) {
        session_regenerate_id(true);
       $_SESSION['last_regenerate'] = time();
}
};

?>