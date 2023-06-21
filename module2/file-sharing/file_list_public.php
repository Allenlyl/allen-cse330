<?php
include_once 'file_list.php';
$directory = 'files/public';
$fileList = retrieveFile($directory);
if (!empty($fileList)) {
    echo '<ul>';
    foreach ($fileList as $file) {
        printf(
            '<li><a href="%s/%s">%s</a></li>',
            htmlentities($directory),
            htmlentities($file),
            htmlentities($file)
        );
    }
    echo '</ul>';
}
