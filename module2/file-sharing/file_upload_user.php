<?php
session_start();
//var_dump("hello world!");
//var_dump($_FILES['file']['name']);
function checkDirPermission($directory)
{
    if (!is_writable($directory)) {
        chmod($directory, 0777);
    }
}
//var_dump($_SESSION['username']);
//Variables
$filename = basename($_FILES['file']['name']);
$tmpDirectory = $_FILES['file']['tmp_name'];
$targetDirectory = 'files/' . $_SESSION['username'] . '/'; //target directory path
$targetFilePath = $targetDirectory . basename($_FILES['file']['name']); //target file path
$fileFormat = pathinfo($_FILES['file']['tmp_name'], PATHINFO_EXTENSION);
//Check if the file uploaded is valid(file name and type and size)
if (isset($_POST['submit'])) {
    //Check the target directory permission
    checkDirPermission($targetDirectory);
    $correctFileFormat = array("pdf", "jpg", "jpeg", "png", "txt", "html", "php");
    //If the file exist, delete it
    if ($targetFilePath === $targetDirectory) {
        $message = "Can't upload nothing";
        $status = "error";
    } elseif (file_exists($targetFilePath) && $targetFilePath != $targetDirectory) {
        unlink($targetFilePath);
    } elseif (!preg_match('/^[a-zA-Z0-9._-]+$/', $filename)) {
        $message = "Invalid file name";
        $status = "error";
    } elseif (!in_array($fileFormat, $correctFileFormat)) {
        $message = "Invalid file format";
        $status = "error";
    } elseif ($_FILES['file']['size'] > 2 * 1024 * 1024) { //file size should be under 2MB
        $message = "The file is oversized";
        $status = "error";
    } else {
        //Move the file to the target directory
        if (move_uploaded_file($tmpDirectory, $targetFilePath)) {
            $message = $filename . " is uploaded successfully!";
            $status = "success";
        } else {
            //header("Location: after_upload.html");
            $message = $filename . " failed to upload";
            $status = "error";
        }
    }
    $_SESSION['message'] = $message;
    $_SESSION['status'] = $status;
    header("Location: after_upload.php");
    exit($message);
}
