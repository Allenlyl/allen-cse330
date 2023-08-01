<?php
session_start();
// get username and password
$username = $_POST['username'];
$password = $_POST['password'];
if (empty($username) || empty($password)) {
    // echo "Username or password is empty. Please try again.";
    header("refresh:1; url = ../php/login.php?login=empty");
    exit;
}
// select data from users table
require "database.php";
$stmt = $mysqli->prepare("SELECT COUNT(*), password, ID FROM users WHERE username = ?");
$stmt->bind_param("s", $username, $user_id);
$stmt->execute();
// get row count and the hashed password with the username
$stmt->bind_result($count, $hash_password);
$stmt->fetch();
if ($count == 1 && password_verify($password, $hash_password)) {
    // login successful
    $_SESSION['user_id'] = $user_id;
} else {
    // login failed
    // echo "Username or password doesn't match. Please try again.";
    header("refresh:3; url = ../php/login.php?login=unmatch");
    exit;
}
