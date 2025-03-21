<?php 
 
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $pwd = $_POST['password'];

    try {
        require_once 'dbs.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';
        
        $errors = [];         
         //displaying the error 
        if (is_username_password_empty($username, $pwd)) {
              $errors["if_input_empty"] = "Please fill in all the fields";
        }
         
        $result = get_user($pdo, $username);
        //displaying the error 
        if (is_username_wrong($result)){
            $errors['login_incorrect'] = "incorrect login info !!";
        }
        //displaying the error 
        if (!is_username_wrong($result) && is_password_wrong($pwd, $result['pwd'])){
            $errors['incorrect_password'] = "incorrect login password !!";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            //if there are errors, store the errors in the session and redirect to the index page
            $_SESSION['errors_login'] = $errors;

            header("Location: ../index.php");
            die();
        }
        //create the session id
        $newsessionid = session_create_id();  //create the session id
        $sessionid = $newsessionid . '_'. $result['id']; 
        session_id($sessionid); //set the session id
        
        $_SESSION['user_id'] = $result['id']; //store the user id in the session
        $_SESSION['user_username'] = htmlspecialchars($result['username']); //store the username in the session

        $_SESSION['last_regenerate'] = time(); //store the last time the session was regenerated
       
        header("Location: ../index.php?signup=success");  //redirect to the index page

        $stmt = null;
        $pdo = null;

        die();


    } catch (PDOException $e) {
        //if there is an error with the connection, stop the script and display the error
        die ( "query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
}