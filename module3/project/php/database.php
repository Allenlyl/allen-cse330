<?php
// Content of database.php

$mysqli = new mysqli('localhost', 'root', '25502688', 'module3proj');

if ($mysqli->connect_errno) {
    printf("123" . "Connection Failed: %s\n", $mysqli->connect_error);
    exit;
    // die("Connection failed: " . $mysqli->connect_error)
}
