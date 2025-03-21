<?php 
//check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //get the form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];


    try {
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';
        require_once 'dbs.inc.php';
// ERROR HANDLING

        $error = [];         

        if (if_input_empty($username,$email,$pwd) == true) {
              $error["if_input_empty"] = "Please fill in all the fields";
        }
        if (if_email_invalid($email) == true) {
            $error["if_email_invalid"] = "Please enter a valid email";
        }
        if (if_username_taken ($pdo, $username)) {
            $error["if_username_taken"] = "this username is already taken";
        }
        if (if_email_taken ($pdo, $email)) {
            $error["if_email_taken"] = "this email is already taken";
        }
        
        require_once 'config_session.inc.php';

        if ($error) {
            //if there are errors, store the errors in the session and redirect to the index page
            $_SESSION['errors_signup'] = $error;
            header("Location: ../index.php");
            die();
        }
        // create the user
        create_user($pdo, $username, $email, $pwd);

        //redirect to the index page
        header("Location: ../index.php?signup=success");

        $stmt = null;
        $pdo = null;

        die();
    } catch (PDOException $e) {
        //if there is an error with the connection, stop the script and display the error
        die ( "query failed: " . $e->getMessage());
    }

} else {
    //redirect to the index page
    header("Location: ../index.php");
}