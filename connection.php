<?php
    $conn = new mysqli('localhost','root','','wunderlist','3306');
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
        die('connect error');
    }
?>