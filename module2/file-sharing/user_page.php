<?php
session_start();
//var_dump($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
    <!-- <style>
        div {
            background-color: pink;
            width: 150px;
            height: 100px;
        }
    </style> -->
</head>

<body>
    <!-- Welcom and logout -->
    <table>
        <tr>
            <td>
                <h2>
                    Welcome
                    <?php echo htmlentities($_SESSION['username']); ?> !
                </h2>
            </td>
            <td>
                <form action="logout.php" method="POST">
                    <button type="submit">Log out</button>
                </form>
            </td>
        </tr>
    </table>
    <!-- User file list -->
    <div>
        <h5>
            <?php echo htmlentities($_SESSION['username']); ?>'s folder
        </h5>
        <?php include_once 'file_list.php'; ?>
    </div>
    <!-- User file upload -->
    <table>
        <tr>
            <td>
                <!-- Upload the file -->
                <form action="file_upload_user.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="file" /><br>
                    <input type="submit" name="submit" value="Upload" />
                </form>
            </td>
        </tr>

    </table>
    <!-- Public file list -->
    <div>
        <h5>public folder</h5>
        <?php include_once 'file_list_public.php'; ?>
    </div>
    <!-- Public file upload -->
    <table>
        <tr>
            <td>
                <form action="file_upload_public.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="file" /><br>
                    <input type="submit" name="submit" value="Upload">
                </form>
            </td>
        </tr>
    </table>

</body>

</html>