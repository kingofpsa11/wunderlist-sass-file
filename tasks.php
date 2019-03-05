<?php
include 'classTask.php';

session_start();

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
    $sql = "SELECT * FROM tasks WHERE id=" . $_GET['id'];    
    $result = $conn->query($sql);
    while($row = $result->fetch_object()) {
        echo json_encode($row);
    };
    $conn->close();
}    

if (isset($_GET['inbox'])) {
    $tasks = new TasksClass();
    $tasks->getAllTasks();
}

if (isset($_POST['rel_id_done'])) {
    $task = new TasksClass();
    $task->markComplete($_POST['rel_id_done']);
}

if (isset($_POST['rel_id_doing'])) {
    $task = new TasksClass();
    $task->markNotComplete($_POST['rel_id_doing']);
}

if (isset($_POST['addTask'])) {
    $task = new TasksClass();
    $title = $_POST['addTask'];
    $task->addTasks($title);
    header("Location:index.php");
}

if (isset($_GET['id'])) {
    $task = new TasksClass();
    $title = $_GET['id'];
    $task->detailTask($title);
    header("Location:index.php?id=" . $_SESSION['click']['id']);
}
?>