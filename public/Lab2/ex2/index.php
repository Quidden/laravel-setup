<?php
session_start();

$correctlogin = 'admin';
$correctpass = "admin";

$logout = isset($_POST['Logout']) ?? false;

if ($logout){
    $_SESSION = [];

    setcookie(session_name(), '', [
        'expires' => time() - 3600,
        'path' => '/'
    ]);

    session_destroy();
    header("Location: form.php");
    exit;
}

if (isset($_SESSION['login'])){
    header("Location: session_true.php");
    exit;
}

if (isset($_POST['login']) && isset($_POST['pass'])){
    if ($_POST['login'] == $correctlogin && $_POST['pass'] == $correctpass){
        $_SESSION['login'] = $correctlogin;
        header("Location: session_true.php");
        exit;
    }
    else{
        header("Location: form.php");
        exit;
    }
}


