<?php

if(!isset($_FILES['image'])){
    die("The file has not been uploaded<br>");
}

$file = $_FILES['image'];

if(!is_uploaded_file($file['tmp_name'])){
    die("The file has not been uploaded<br>");
}

echo "The file has been uploaded<br>";

if($file['size'] > 2 * 1024 * 1024){
    die("The file is too large<br>");
}

$types = ['image/png', 'image/jpeg', 'image/jpg',];

if(!in_array($file['type'], $types)){
    die("The file is not an image<br>");
}


if(!is_dir('uploads/')){
    mkdir('uploads/', 0777, true);
}

$path = 'uploads/' . $file['name'];

$filename = pathinfo($file['name'], PATHINFO_FILENAME);
$extension = pathinfo($file['name'], PATHINFO_EXTENSION);

$flag = false;
$newName = '';
if(file_exists($path)){
    echo("The file already exists<br>");
    $random = rand(1000, 9999);
    $newName = $filename . '_' . $random . '.' . $extension;
    $path = 'uploads/' . $newName;
    echo("The file has been renamed<br>");
    $flag = true;
}

move_uploaded_file($file['tmp_name'], $path);

echo "<br>",$file['size'] / 1024;
if ($flag){
    echo "<br>",$newName;
}else{
    echo "<br>",$file['name'];
}
echo "<br>",$file['type'];

echo '<br><a href="' . $path . '" download>Download file</a>';
