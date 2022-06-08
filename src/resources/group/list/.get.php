<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/resources/css/style.css">
    <link rel="stylesheet" href="/resources/css/reset.css">
    <link rel="stylesheet" href="/resources/css/index.css">
    <title>sqnote - list groups</title>
</head>
<body>
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/resources/.mysqli.php';

$user_groups = $conn->query("SELECT group_id FROM Users_Groups WHERE user_id = {$_SESSION['id']}");

while ($group_id = $user_groups->fetch_assoc()['group_id']) {
    $group_name = $conn->query("SELECT name FROM `Groups` WHERE id = $group_id")->fetch_array()['name'];
    echo "<a href=/group/view?id=$group_id&name=$group_name>$group_name</a>";
}
?>
</body>
</html>
