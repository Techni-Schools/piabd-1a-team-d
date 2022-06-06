<?php
session_start();
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