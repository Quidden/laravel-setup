<?php
// 7
$username = $_POST["name"];
$namecheck = false;
$usersurname = $_POST["surname"];
$surnamecheck = false;

if (is_string($username) && !empty($username)){
    $namecheck = true;
}else{
    echo "Name is not valid";
}
if (is_string($usersurname) && !empty($usersurname)){
    $surnamecheck = true;
}else{
    echo "Surname is not valid";
}

if ($namecheck && $surnamecheck){
    echo $username . " " . $usersurname . " All fields are valid!";
}
