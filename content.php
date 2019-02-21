<?php
if (isset($_POST['task'])) {
    include_once('connection.php');   
    $sql = "INSERT INTO tasks (task)
            VALUES('" . $_POST["task"] . "')";
    $conn->query($sql);
    echo 'success';
}
?>