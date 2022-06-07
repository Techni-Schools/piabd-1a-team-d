<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo 'sqnote ' . $_GET['note_id']?></title>
</head>
<body>
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/libs/Parsedown.php';

echo Parsedown::instance()->setSafeMode(true)->parse(file_get_contents($_SERVER['DOCUMENT_ROOT'] .
    '/note/raw/' . $_GET['note_id']));
?>
</body>
</html>