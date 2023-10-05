<?php
session_start();

function userExists($username)
{
    $users = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($users as $user) {
        list($storedUsername, $storedPassword) = explode(",", $user);
        if ($username == $storedUsername) {
            return true;
        }
    }
    return false;
}

function authenticate($username, $password)
{
    $users = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($users as $user) {
        list($storedUsername, $storedPassword) = explode(",", $user);
        if ($username == $storedUsername && $password == $storedPassword) {
            $_SESSION['user'] = $username;
            return true;
        }
    }
    return false;
}

function registerUser($username, $password)
{
    if (userExists($username)) {
        return false;
    }
    file_put_contents('users.txt', $username . "," . $password . PHP_EOL, FILE_APPEND);
    return true;
}

function logFailedLogin($username)
{
    file_put_contents('accessattempts.txt', $username . " - " . date('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);
}
?>