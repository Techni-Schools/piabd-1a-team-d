<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/resources/css/style.css">
    <link rel="stylesheet" href="/resources/css/reset.css">
    <title>sqnote - list notes</title>
</head>
<body>
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/resources/.mysqli.php';

$notes = $conn->query('SELECT * FROM Notes WHERE user_id = ' . $_SESSION['id']);

while ($note = $notes->fetch_assoc()) {
    echo '<a href="/note/display?note=' . $note['id'] . '-' . $note['name'] . '">' . $note['name'] . '</a><br>';
}
echo '<a href="/">Home</a>';
?>
</body>
</html>