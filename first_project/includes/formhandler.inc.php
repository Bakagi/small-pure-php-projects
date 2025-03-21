<?php 
//check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //get the form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    try {
        //connect to the database
        require_once 'dbh.inc.php';
         //create the query
        $query = "INSERT INTO users (username, email, pwd) VALUES (:username, :email, :pwd)";
        //we use prepared statements to prevent SQL injection
         //prepare the query
        $stmt = $pdo->prepare($query);

        $options = [
            'cost' => 12
            ];
            //hash the password
            $hpwd = password_hash($pwd , PASSWORD_BCRYPT, $options);
        //bind the parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pwd', $hpwd);

        
        //execute the query
        $stmt->execute();
        
        //redirect to the index page
        $query = null;
        //close the connection
        $stmt = null;
        header("Location: ../index.php");
        die();
    } catch (PDOException $e) {
        //if there is an error with the connection, stop the script and display the error
        die ( "query failed: " . $e->getMessage());
}}else{
    //redirect to the index page
    header("Location: ../index.php");
    
}
?>