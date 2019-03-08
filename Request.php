<?php
include 'Task.php';

use Model\Task;

//create new Task
if (isset($_POST['addTask'])) {
    $task = new Task();
    $task->title = $_POST['addTask'];    
    $task->addTask();
}

//get detail of Task
if (isset($_GET['id'])) {
    $task = new Task();
    $task->id = $_GET['id'];
    $task->getTask();
}

//Change status of Task
if (isset($_POST['status'])) {
    $task = new Task();
    $task->id = $_POST['id'];
    $task->status = $_POST['status'];
    $task->changeStatus();
}

//Change duedate
if (isset($_POST['duedate'])) {
    $task = new Task();
    $task->duedate = $_POST['duedate'];
    $task->id = $_POST['id'];
    $task->changeDuedate();
}

if (isset($_POST['subtask'])) {
    $task = new Task();
    $task->subtask = $_POST['subtask'];
    $task->id = $_POST['id'];
    $task->addSubtask();
}
?>