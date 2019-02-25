<?php
include 'classTask.php';

use TasksClass\TasksClass;

//add Title for task
if (isset($_POST['task'])) {
    $title = $_POST['task'];
    $task = new TasksClass();
    $task->title = $title;
    $task->addTasks($title);
}

if (isset($_GET['id'])) {
    include('connection.php');
    $sql = "SELECT detail_date FROM tasks WHERE id=" . $_GET['id'];
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        echo $row['detail_date'];
    };
}

if (isset($_GET['inbox'])) {
    $tasks = new TasksClass();
    $tasks->getAllTasks();
}
?>