<?php
session_start();
//When I use include_once('file_upload_user.php') to use the two functions, for some
//reason it seems like all the variables inherit the values in the previous file and couldnt be changed
function checkDirPermission($directory)
{
    if (!is_writable($directory)) {
        chmod($directory, 0777);
    }
}

function getTargetFilePath($filename, $targetDirectory)
{
    $targetpath = $targetDirectory . $filename;
    return $targetpath;
}

//Variables
$filename = basename($_FILES['file']['name']);
$tmpDirectory = $_FILES['file']['tmp_name'];
$targetDirectory = 'files/public/'; //target directory path
//$fileFormat = pathinfo($_FILES['file']['tmp_name'], PATHINFO_EXTENSION);
//Check if the file uploaded is valid(file name and type and size)
$targetFilePath = getTargetFilePath($filename, $targetDirectory);
//echo $targetFilePath;
if (isset($_POST['submit'])) {
    //Check the target directory permission
    checkDirPermission($targetDirectory);
    $fileFormat = $_FILES['file']['type'];
    $correctFileFormat = array(
        'application/pdf',
        'image/jpeg',
        'image/png',
        'text/plain',
        'text/html',
        'text/php'
    );
    //If the file exist, delete it
    if ($targetFilePath === $targetDirectory) {
        $message = "Can't upload nothing";
        $status = "error";
    } elseif (!preg_match('/^[a-zA-Z0-9.\s_-]+$/', $filename)) {
        $message = "Invalid file name";
        $status = "error";
    } elseif (!in_array($fileFormat, $correctFileFormat)) {
        $message = "Invalid file format";
        $status = "error";
    } elseif ($_FILES['file']['size'] > 2 * 1024 * 1024) { //file size should be under 2MB
        $message = "The file is oversized";
        $status = "error";
    } else {
        if (file_exists($targetFilePath) && $targetFilePath != $targetDirectory) {
            unlink($targetFilePath);
        }
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
