<?php 

declare(strict_types=1);
//check if the form was submitted
function check_error_message(){
if (isset($_SESSION['errors_signup'])) {
    
    $errors = $_SESSION['errors_signup'];
    
    echo "</br>";
    
    foreach($errors as $error) {
        echo "<p class='error_signup'>" . $error . " </p>"; //display the errors
    }
    
    unset($_SESSION['errors_signup']); //unset the session variable
} else if (isset($_GET['signup']) && $_GET['signup'] == 'success') {
    echo "<p class='success_signup'>Sign up successful</p>"; //display the success message
}};