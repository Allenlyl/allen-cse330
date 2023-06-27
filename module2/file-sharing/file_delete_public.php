<?php
session_start();
function getFilePath($file, $username)
{
    $filePath = realpath('files/public/' . $file);
    return $filePath;
}
//Retrieve data from url: file and username
$file = $_GET['file'];
$username = $_GET['username'];
$loginUsername = $_SESSION['username'];
//Check if the file name format is right to prevent directory traversal vulnerability attack
//Check the file name format(directory traversal vulnerability)
if (!preg_match('/^[a-zA-Z0-9_\-.]+$/', $file)) {
    $message = 'Invalid file name';
    $_SESSION['message'] = $message;
    header("Location: file_invalid.php");
    exit;
}
//Check if the user has the access to change the file
//Check the username format(directory traversal vulnerability)
if (!preg_match('/^[a-zA-Z0-9_\-.]+$/', $username)) {
    $message = 'Invalid username';
    $_SESSION['message'] = $message;
    header("Location: file_invalid.php");
    exit;
}
//Check if the user is the same logined user
if ($username !== $loginUsername) {
    $message = 'Invalid username';
    $_SESSION['message'] = $message;
    header("Location: file_invalid.php");
    exit;
}
//Check the file path, if realpath() couldn't find a valid path, it will return false
//Strpos check
$filePath = getFilePath($file, $username);
if ($filePath === false || strpos($filePath, realpath('files/public')) !== 0) {
    $message = 'Invalid file path';
    $_SESSION['message'] = $message;
    header("Location: file_invalid.php");
    exit;
}
//Unlink the file
unlink($filePath);
header('Location: user_page.php');
exit;
