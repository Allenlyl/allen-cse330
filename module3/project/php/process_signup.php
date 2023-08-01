<!-- verify the validility of the registration
1. email already exist?
2. username already exist?
3. all filled?
update the user table -->

<?php
require 'database.php';

// verify the registration data
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
// check any empty field
if (empty($username) || empty($email) || empty($password) || empty($first_name) || empty($last_name)) {
    //echo ("All fields are required.");
    header("refresh:3; url = ../php/signup.php?signup=empty");
    exit;
}
// check for username duplicates
$stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
if ($stmt->num_rows() > 0) {
    // printf(
    //     "Username %s has already been taken!",
    //     htmlentities($username)
    // );
    header("refresh:3; url = ../php/signup.php?signup=username&");
    exit;
}
// check for email duplicates
$stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
if ($stmt->num_rows() > 0) {
    // printf(
    //     "Email %s has been used!",
    //     htmlentities($email)
    // );
    header("refresh:3; url = ../php/signup.php?signup=email");
    exit;
}
// add data to the users table
$hash_password = password_hash($password, PASSWORD_BCRYPT);
$stmt = $mysqli->prepare("INSERT INTO users (first_name, last_name, email, username, password) 
                VALUES (?, ?, ?, ?, ?)");
if (!$stmt) {
    printf("Query Prep Failed: %s\n", $mysqli->error);
    exit;
}
$stmt->bind_param("sssss", $first_name, $last_name, $email, $username, $hash_password);
if ($stmt->execute()) {
    // echo "Registration succeed! Please login.";
    header("refresh:3; url = login.php?login=success");
    exit;
} else {
    echo "Error executing statement: " . $stmt->error;
    exit;
}

$stmt->close();
$mysqli->close();
?>