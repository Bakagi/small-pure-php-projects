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
        $query = "UPDATE users SET username = :username, email = :email, pwd = :pwd WHERE id = 2;";
      //we use prepared statements to prevent SQL injection
         //prepare the query
        $stmt = $pdo->prepare($query);
        //bind the parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pwd', $pwd);
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