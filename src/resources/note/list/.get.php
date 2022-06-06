<?php
require $_SERVER['DOCUMENT_ROOT'] . '/resources/.mysqli.php';

$query = $conn->query('SELECT * FROM Notes WHERE user_id = ' . $_SESSION['id']);

while ($row = $query->fetch_assoc()) {
    echo '<a href="/note/display?note_id=' . $row['id'] . '">' . $row['name'] . '</a>';
}
