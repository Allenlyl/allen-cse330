<?php
include_once 'file_list.php';
$directory = 'files/public';
$fileList = retrieveFile($directory);
$username = $_SESSION['username'];
if (!empty($fileList)) {
    echo '<table>';
    foreach ($fileList as $file) {
        // printf(
        //     '<li><a href="%s/%s">%s</a></li>',
        //     htmlentities($directory),
        //     htmlentities($file),
        //     htmlentities($file)
        // );
        echo "<tr>";
        printf(
            '<td>%s</td>
            <td><a href="file_view_public.php?file=%s&username=%s"><button>View</button></a></td>
            <td><a href="file_delete_public.php?file=%s&username=%s"><button>Delete</button></a></td>',
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
