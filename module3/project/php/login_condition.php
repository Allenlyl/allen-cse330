<?php
if (isset($_GET['login'])) {
    switch ($_GET['login']) {
        case "empty":
            echo "<div class='message'>There is empty field. Please try again.</div>";
            echo "<br>";
            break;
        case "unmatch":
            echo "<div class='message'>Username or password doesn't match. Please try again.</div>";
            echo "<br>";
            break;
    }
}
