<?php
require $_SERVER['DOCUMENT_ROOT'] . '/resources/.mysqli.php';

$notes = $conn->query('SELECT * FROM Notes WHERE user_id = ' . $_SESSION['id']);

while ($note = $notes->fetch_assoc()) {
    echo '<a href="/note/display?note=' . $note['id'] . '-' . $note['name'] . '">' . $note['name'] . '</a><br>';
}
echo '<a href="/">Home</a>';
