<?php
    require_once 'includes/signup_view.inc.php';
    require_once 'includes/config_session.inc.php';
    require_once 'includes/login_view.inc.php';

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  //check if the user is logged in
   <?php
    if (!isset($_SESSION['user_id'])) {
    ?>
    <h1>Log in</h1> 
    <form action="/includes/login.inc.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username"></br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password"></br>
        <input type="submit" value="Log in">

        <?php
        check_error_message_login(); //check if there are any errors
        ?>
    </form>


    <?php  } else { ?>
        <form action="/includes/logout.inc.php">
        <h1>Log out</h1>
        <input type="submit" value="Log out">
    </form>

    <?php  }  ?>
  <?php
     user_loged_in(); //check if the user is logged in
  ?>
    <h1>Sign up</h1>
    <form action="/includes/signup.inc.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username"></br>
        <label for="email">Email</label>
        <input type="text" name="email" id="email"></br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password"></br>
        <input type="submit" value="Sign up"></br>

        <?php
        check_error_message(); //check if there are any errors
        ?>

    </form>

</body>
</html>