<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <h2>Example 1</h2>
    <?php
    require_once 'classes/car.php';

    $car01 = new car('accent' , 'red');
     echo $car01->getColor();
      
     $car01->setColor('prrrple');
     echo $car01->getColor();
    ?>

    <h2>example 2</h2>
    <h4>signup</h4>
    <form action="includes/signup.inc.php" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="pwd" placeholder="password">
        <button type="submit" name="submit">signup</button>
</body>
</html>