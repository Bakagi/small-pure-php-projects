<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>User Search</h1>
    <form action="usersearch.php" method="post">
        <input type="text" name="usersearch" placeholder="Search .."></br>
        <button type="submit" name="submit">Search</button>
    </form>
    <h1>Sign up</h1></br>
    <form action="includes/formhandler.inc.php" method="post">
        <input type="text" name="username" placeholder="Username"></br>
        <input type="text" name="email" placeholder="Email"></br>
        <input type="password" name="password" placeholder="Password"></br>
        <button type="submit" name="submit">Sign up</button></br>
    </form>
    <h1>Update user</h1>
    <form action="includes/userupdate.inc.php" method="post">
        <input type="text" name="username" placeholder="Username"></br>
        <input type="text" name="email" placeholder="Email"></br>
        <input type="password" name="password" placeholder="Password"></br>
        <button type="submit" name="submit">Update</button>

    </form>
    <h1>Delete user</h1>
    <form action="includes/userdelete.inc.php" method="post">
        <input type="text" name="username" placeholder="Username"></br>
        <input type="password" name="password" placeholder="Password"></br>
        <button type="submit" name="submit">Delete</button>
    </form>
</body>


</html>