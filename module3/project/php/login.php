<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        a {
            text-decoration: none;
            color: black;
        }

        .yellowgreen:hover {
            background-color: yellowgreen;
        }

        .message {
            background-color: pink;
        }
    </style>
</head>

<body>
    <h2>User Login</h2>
    <?php
    include "login_condition.php";
    ?>
    <div>
        <form action="process_login.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username"> <br><br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password"> <br><br>
            <input type="submit" value="login" class="yellowgreen">
        </form>
    </div> <br>
    <div>
        <button class="yellowgreen"><a href="signup.php" id="signup">Sign up</a></button>
    </div>
</body>

</html>