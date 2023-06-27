<?php
session_start();
function getFilePath($file)
{
    $filePath = realpath('files/public/' . $file);
    return $filePath;
}
$file = $_GET['file'];
$username = $_GET['username'];
$loginUsername = $_SESSION['username'];
//Check the file name format(directory traversal vulnerability)
if (!preg_match('/^[a-zA-Z0-9_\-.]+$/', $file)) {
    $message = 'Invalid file name';
    $_SESSION['message'] = $message;
    header("Location: file_invalid.php");
    exit;
}
//Check if the user is the same logined user
if ($username !== $loginUsername) {
    $message = 'Invalid file name';
    $_SESSION['message'] = $message;
    header("Location: file_invalid.php");
    exit;
}
//Check the file path, if realpath() couldn't find a valid path, it will return false
//Strpos check if the first parameter starts with the second parameter
$filePath = getFilePath($file, $username);
if ($filePath === false || strpos($filePath, 'files/' . $username)) {
    $message = 'Invalid file path';
    $_SESSION['message'] = $message;
    header("Location: file_invalid.php");
    exit;
}
//Read the file
$filePath = getFilePath($file);
//echo $filePath;
header('Content-Type: ' . mime_content_type($filePath));
header('Content-Disposition: inline');
readfile($filePath);
exit;
