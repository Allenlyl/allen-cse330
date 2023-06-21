<?php
session_start();
if (!isset($_SESSION['username'])) {
    exit("You have to log in to view the main page, thanks!");
}

$username = $_SESSION['username'];
var_dump($_SESSION['username']);
