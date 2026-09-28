<?php

$log = fopen('logs.txt', 'a+');

fwrite($log, date('\n' . 'Y-m-d H:i:s') . " Action\n");
rewind($log);

$content = fread($log, filesize('logs.txt'));

fclose($log);

echo $content;
