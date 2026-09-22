<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header('Location: form.php');
    exit;
}

$ip = $_SERVER['REMOTE_ADDR'];
$agent = $_SERVER['HTTP_USER_AGENT'];
$script_name = $_SERVER['SCRIPT_NAME'];
$requst_method = $_SERVER['REQUEST_METHOD'];
$file_name = $_SERVER['SCRIPT_FILENAME'];

echo "IP: $ip<br>";
echo "User Agent: $agent<br>";
echo "Script Name: $script_name<br>";
echo "Request Method: $requst_method<br>";
echo "File Name: $file_name<br>";
