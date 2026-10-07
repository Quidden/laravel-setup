<?php

function generateData($iteration){
    sleep(2);
    $userName = ['Anton', 'Boris', 'Vladimir','Kirill'];
    $dataArray = [];
    for ($i = 0; $i < $iteration; $i++){
        $name = $userName[rand(0,3)];
        $dataArray[$i] = $name;
    }
    return $dataArray;
}
session_start();

if (isset($_SESSION['cached_data']) && isset($_SESSION['cached_time'])){
    $age = time() - $_SESSION['cached_time'];
    if ($age < 60*10){
        $data = $_SESSION['cached_data'];
        $source = 'cache';
    }else{
        $data = generateData(100);
        $_SESSION['cached_data'] = $data;
        $_SESSION['cached_time'] = time();
        $source = 'cache update';
    }
}else{
    $data = generateData(100);
    $_SESSION['cached_data'] = $data;
    $_SESSION['cached_time'] = time();
    $source = 'new cache';
}

echo "<p>$source</p>";
for ($i = 0; $i < count($data); $i++){
    echo $data[$i] . "<br>";
}
