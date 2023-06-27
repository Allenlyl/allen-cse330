<?php
//Starting the session
session_start();
//Function that checks whether the username is valid, return true if valid
function checkUsername($username)
{
    //Read the file line by line and compare it with the given username
    $h = fopen('files/users.txt', 'r');
    while (!feof($h)) {
        if ($username == trim(fgets($h))) {
            fclose($h);
            return true;
        }
    }
    fclose($h);
    return false;
}

//var_dump($_SESSION['username']);

//When the form is submitted, check the username's validity, if valid set
//the session name to username and redirect to the logged-in page
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    if (checkUsername($username)) {
        $_SESSION['username'] = $username;
        //Create a folder for the user if she does not have one
        $directory = 'files/' . $username;
        if (!file_exists($directory)) {
            mkdir($directory, 0777);
        }
        header('Location: user_page.php');
        exit;
    } else {
        echo "Invalid username, please try again!";
        echo '<br>';
        echo '<a href="login.html">Go back</a>';
    }
}
