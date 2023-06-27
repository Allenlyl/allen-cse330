<?php
session_start();

//Check if the directory is writable, if not set it to writable
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
//$_FILES is the superglobal variable of the uploaded file in the form
$filename = basename($_FILES['file']['name']);
$tmpDirectory = $_FILES['file']['tmp_name']; //temporary file path
$targetDirectory = 'files/' . $_SESSION['username'] . '/'; //target directory path
//$fileFormat = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); //get the format of the file

//Check if the file uploaded is valid(file name and type and size)
$targetFilePath = getTargetFilePath($filename, $targetDirectory);
if (isset($_POST['submit'])) {
    //Check the target directory permission
    checkDirPermission($targetDirectory);
    //Extract the format of the file (MIME)
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
    } elseif (file_exists($targetFilePath) && $targetFilePath != $targetDirectory) {
        unlink($targetFilePath);
    } elseif (!preg_match('/^[a-zA-Z0-9\._-]+$/', $filename)) {
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
