<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>
    <h2>Registration</h2>
    <form action="process_signup.php" method="post">
        <label for="email">Email</label>
        <input type="text" name="email" id="email"><br><br>
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" id="firstname"><br><br>
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" id="lastname"><br><br>
        <label for="username">Username</label>
        <input type="text" name="username" id="username"><br><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>