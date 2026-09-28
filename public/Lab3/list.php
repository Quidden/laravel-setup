<?php

if (!is_dir('uploads/')) {
    die('No uploads directory found.');
}

$dir = opendir('uploads/');

while (($file = readdir($dir)) !== false) {
    if ($file === '.' || $file === '..') {
        continue;
    }

    echo '<br><a href="' . 'uploads/' .  $file . '" download> ' . $file . '</a>';
}

closedir($dir);
