<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" ></br>
        <label for="name">password:</label>
        <input type="password" name="pass" ></br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>
<?php
   // Check if the form is submitted
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    // output the value of the input field
    echo "Name: $name <br> Password: $pass";
   };