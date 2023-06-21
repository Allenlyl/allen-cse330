<?php
//The directory where the username folder is
//scandir() returns an array of the file list in the directory
function retrieveFile($directory)
{
    return array_diff(scandir($directory), array('.', '..', '.DS_Store'));
}
//var_dump($_SESSION['username']);
$directory = 'files/' . $_SESSION['username'];
$fileList = retrieveFile($directory);
//If the file list is not empty
if (!empty($fileList)) {
    echo '<ul>';
    foreach ($fileList as $file) {
        //echo "<li><a href="files/' . $directory/$file">" . $file . '</a></li>';
        printf(
            '<li><a href="%s/%s">%s</a></li>',
            htmlentities($directory),
            htmlentities($file),
            htmlentities($file)
        );
    }
    echo '</ul>';
} else {
    echo "The folder is empty";
}
