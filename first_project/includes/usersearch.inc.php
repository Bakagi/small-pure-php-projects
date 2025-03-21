<?php
//check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //get the form data
    $usersearch = $_POST['usersearch'];
    try {
        //connect to the database
        require_once 'dbh.inc.php';
         //create the query
        $query = "SELECT * FROM comment WHERE username = :usersearch";
        //we use prepared statements to prevent SQL injection
         //prepare the query
        $stmt = $pdo->prepare($query);
        //bind the parameters
        $stmt->bindParam(':usersearch', $usersearch);
        //execute the query
        $stmt->execute();
        //fetch the results
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //redirect to the index page
        $query = null;
        //close the connection
        $stmt = null;
    } catch (PDOException $e) {
        //if there is an error with the connection, stop the script and display the error
        die ( "query failed: " . $e->getMessage());
}}else{
    //redirect to the index page
    header("Location: ../index.php");
    
}
?>
