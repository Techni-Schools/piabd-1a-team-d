<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: /account/login', true, 303);
}
if ($_SERVER['REQUEST_METHOD'] == 'GET')
    require $_SERVER['DOCUMENT_ROOT'] . '/resources/note/list/.get.php';
elseif ($_SERVER['REQUEST_METHOD'] == 'POST')
    require $_SERVER['DOCUMENT_ROOT'] . '/resources/note/list/.post.php';
else
    include $_SERVER['DOCUMENT_ROOT'] . '/resources/http_codes/405.php';
