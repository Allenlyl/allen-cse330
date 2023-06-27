<?php
//The directory where the username folder is
//scandir() returns an array of the file list in the directory
function retrieveFile($directory)
{
    return array_diff(scandir($directory), array('.', '..', '.DS_Store'));
}
//var_dump($_SESSION['username']);
$username = $_SESSION['username'];
$directory = 'files/' . $username;
$fileList = retrieveFile($directory);
//If the file list is not empty
if (!empty($fileList)) {
    echo '<table>';
    foreach ($fileList as $file) {
        //echo "<li><a href="files/' . $directory/$file">" . $file . '</a></li>';
        // printf(
        //     '<li><a href="%s/%s">%s</a></li>',
        //     htmlentities($directory),
        //     htmlentities($file),
        //     htmlentities($file)
        // );

        //Should perform a file name format check before using
        $filePath = realpath($directory . '/' . $file);
        echo "<tr>";
        printf(
            '<td>%s</td>
            <td><a href="file_view_user.php?file=%s&username=%s"><button>View</button></a></td>
            <td><a href="file_delete_user.php?file=%s&username=%s"><button>Delete</button></a></td>',
            htmlentities($file),
            htmlentities($file),
            htmlentities($username),
            htmlentities($file),
            htmlentities($username)
        );
        echo "</tr>";
    }
    echo '</table>';
} else {
    echo "The folder is empty";
}
