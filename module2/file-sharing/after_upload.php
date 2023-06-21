<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload summary</title>
</head>

<body>
    <?php
    $message = $_SESSION['message'];
    $status = $_SESSION['status'];
    echo "<p>" . htmlentities($status) . "</p>";
    echo "<p>" . htmlentities($message) . "</p>";
    ?>
    <form action="user_page.php" method="post">
        <input type="submit" value="Go back">
    </form>
</body>

</html>