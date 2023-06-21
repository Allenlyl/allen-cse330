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
    <style>
        div {
            background-color: pink;
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>

    <h2>
        Welcome
        <?php echo $_SESSION['username']; ?> !
    </h2>
    <div>
        <h5>
            <?php echo $_SESSION['username']; ?> folder
        </h5>
        <?php include_once 'file_list.php'; ?>
    </div>
    <table>
        <tr>
            <td>
                <!-- Upload the file -->
                <form action="file_upload_user.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="file" /><br>
                    <input type="submit" name="submit" value="Upload" />
                </form>
            </td>
            <td>
                <!-- Delete the file -->
                <form action="file_delete.php" , method="post">
                    <button type="submit" name="delete">Delete</button>
                </form>
            </td>
        </tr>

    </table>
    <div>
        <h5>public folder</h5>
        <?php include_once 'file_list_public.php'; ?>
    </div>
    <table>
        <tr>
            <td>
                <form action="file_upload_public.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="file" /><br>
                    <input type="submit" name="submit" value="Upload">
                </form>
            </td>
            <td>
                <form action="file_delete.php" method="post">
                    <input type="text" name="fileToDelete">
                    <input type="submit" name="submit" value="Delete">
                </form>
            </td>
        </tr>
    </table>

</body>

</html>