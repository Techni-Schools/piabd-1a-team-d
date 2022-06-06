<?php
require $_SERVER['DOCUMENT_ROOT']  . '/resources/.mysqli.php';

$username = "'" . bin2hex($_POST['username']) . "'";
$email = "'" . bin2hex($_POST['email']) . "'";
$password = "'" . bin2hex(password_hash($_POST['password'], PASSWORD_DEFAULT)) . "'";

if ($conn->query("SELECT * FROM Users WHERE username = UNHEX($username)")->num_rows != 0) {
    header('Refresh: 3');
    die('<h1>This username has already been taken</h1>');
}
if ($conn->query("SELECT * FROM Users WHERE email = UNHEX($email)")->num_rows != 0) {
    header('Refresh: 3');
    die('<h1>This email has already been taken</h1>');
}

$conn->query("INSERT INTO Users (username, email, password) VALUES (UNHEX($username), UNHEX($email), UNHEX($password))");

http_response_code(303);
header('Location: /account/login');
