<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']  . '/resources/.mysqli.php';

$email = $_POST['email'];
$password = $_POST['password'];
$query = $conn->query('SELECT * FROM Users WHERE email = UNHEX(\'' . bin2hex($email) . '\')')->fetch_array();

$hash = $query['password'];

if (password_verify($password, $hash)) {
    $_SESSION['id'] = $query['id'];
    $_SESSION['username'] = $query['username'];
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $hash;

    $user_id = "'" . $_SESSION['id'] . "'";
    $user_groups_id_query = $conn->query("SELECT group_id FROM Users_Groups WHERE user_id = $user_id");

    $user_groups_id = "";
    while ($id = $user_groups_id_query->fetch_assoc()['group_id']) {
        $user_groups_id .= $id . ',';
    }

    $_SESSION['groups'] = $user_groups_id;

    http_response_code(303);
    header('Location: /');
} else {
    header('Refresh: 3');
    die('<h1>Incorrect username or password</h1>');
}
