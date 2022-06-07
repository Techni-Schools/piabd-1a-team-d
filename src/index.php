<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/resources/css/reset.css">
    <link rel="stylesheet" href="/resources/css/style.css">
    <title>sqnote</title>
</head>
<body>
<?php
echo session_id() . '<br>';
if (isset($_SESSION['username'])) {
    echo "<h2>Hello {$_SESSION['username']}.</h2>";
    echo '<a href=/account/logout>Logout</a><br>';
    echo '<a href=/note/create>Create note</a><br>';
    echo '<a href=/note/list>List notes</a>';
} else {
    echo '<a href=/account/login>Login</a><br>';
    echo '<a href=/account/register>Register</a>';
}
?>
</body>
</html>