<?php
// 1,2
$arr = array ("hello world", 1, 1.5, True);     // Creating an array with different types of values
foreach ($arr as $var){                         // A loop to iterate through the elements of an array
    echo var_dump($var) . "<br>";               // Displaying the value of each element in the array
}

// 3
$left = "Hello";
$right = "World";
echo $left . " " . $right . "<br>";

// 4
$val = 2;
if ($val % 2 == 0){
    echo "true";
}else{
    echo "false";
}

// 5
echo "for". "<br>";
for ($i = 1; $i <= 10; $i++){
    echo $i . "<br>";
}

echo "while". "<br>";
$j = 10;
while ($j >= 1){
    echo $j . "<br>";
    $j--;
}

// 6
$students = [
    "name" => "STUDENT NAME",
    "surname" => "STUDENT SURNAME",
    "group" => "IKM224A",
];

foreach ($students as $key => $value){
    echo $key . ": " . $value . "<br>";
}

$students["avarage_grade"] = 4.5;
foreach ($students as $key => $value){
    echo $key . ": " . $value . "<br>";
}
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
