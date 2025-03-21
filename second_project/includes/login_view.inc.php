<?php 

declare(strict_types=1);

function user_loged_in(){
    if (isset($_SESSION['user_id'])) {
        echo "you are logged in as " . $_SESSION['user_username'];
    } else { 
        echo "you are not logged in";
    }
}

function check_error_message_login(){
if (isset($_SESSION['errors_login'])) {
    
    $errors = $_SESSION['errors_login'];
    
    echo "</br>";
    
    foreach($errors as $error) {
        echo "<p class='error_login'>" . $error . " </p>"; //display the errors
    }
    
    unset($_SESSION['errors_login']); //unset the session variable
    die();
} else if (isset($_GET['login']) && $_GET['login'] == 'success') {
    echo "<p class='success_login'>Login successful</p>"; //display the success message
    
     
}
}