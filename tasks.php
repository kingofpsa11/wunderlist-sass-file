<?php
if (isset($_POST['task'])) {
    include('connection.php');
    $sql = "INSERT INTO tasks (task,overdue) VALUES ('" . $_POST['task'] . "','doing')";
    $conn->query($sql);
    $conn->close();
}

if (isset($_GET['id'])) {
    // include('connection.php');
    // $sql = "SELECT detail_date FROM tasks WHERE id=" . $_POST['id'];
    echo gettype($_GET['id']);
}
?>