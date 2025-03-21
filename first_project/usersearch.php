<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user Search</title>
</head>
<body>
<h1>Search Results: </h1>
<?php
require_once('includes/usersearch.inc.php');
//check if there are any results
     if (empty($result)) {
        echo "<div>";
        echo "No results found";
        echo "</div>";
     } else {
        foreach ($result as $row)
        echo "<div>";
        //output the results
        //use htmlspecialchars to prevent XSS attacks
        echo "<h4>" . htmlspecialchars($row['username']) . "</h4>";
        echo "<p>" . htmlspecialchars($row['comment_text']) . "</p>"; 
        echo "<p>" . htmlspecialchars($row['created_at']) . "</p>"; 
        echo "</div>";
     };
     ?>
</body>
</html>