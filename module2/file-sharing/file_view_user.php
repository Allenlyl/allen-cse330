<?php
session_start();
function getFilePath($file, $username)
{
    $filePath = realpath('files/' . $username . '/' . $file);
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
// if ($filePath === false || strpos($filePath, 'files/' . $username) !== 0) {
//     $message = 'Invalid file path';
//     $_SESSION['message'] = $message;
//     header("Location: file_invalid.php");
//     exit;
// }
//Set the header to its MIME type and read the file
header('Content-Type: ' . mime_content_type($filePath));
header('Content-Disposition: inline');
readfile($filePath);
exit;
