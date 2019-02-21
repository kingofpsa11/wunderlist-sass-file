<?php
$file = fopen("test.txt","w");
$content = fread($file,filesize("test.txt"));
echo $content;
fclose($file);
?>