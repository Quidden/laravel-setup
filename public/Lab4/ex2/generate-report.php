<?php

$cacheFilePath = 'cache/report.html';
if (file_exists($cacheFilePath) && time() - filemtime($cacheFilePath) < 60*10) {
    echo 'cache';
    echo file_get_contents($cacheFilePath);
    exit;
}


sleep(3);
echo 'no cache';
$html = '<table>';
for ($i = 1; $i <= 1000; $i++) {
    $html .= '<tr>';
    $html .= '<td>' . $i . '</td>';
    $html .= '<td>' . rand(100, 10000) . '</td>';
    $html .= '<td>' . date('Y-m-d') . '</td>';
    $html .= '</tr>';
}

$html .= '</table>';

echo $html;
file_put_contents($cacheFilePath, $html);
