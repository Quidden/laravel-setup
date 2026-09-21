<?php
$action = $_POST["action"] ?? '';

if ($action == "save"){
    setcookie("name",
        $_POST["name"],
        time() + 60*60*24*7,
        "/");
}
if ($action == "delete"){
    setcookie("name", "", time() - 3600, "/");
}
header('Location: form.php');
//exit;
