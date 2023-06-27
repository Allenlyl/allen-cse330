<?php
session_start();
$message = $_SESSION['message'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if ($message === 'Invalid username') {
        echo htmlentities($message) . '<br>';
        echo '<a href="logout.php">Go back</a>';
    } else {
        echo htmlentities($message) . '<br>';
        echo '<a href="user_page.php">Go back</a>';
    }
    ?>
</body>

</html>