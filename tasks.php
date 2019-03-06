<?php
include 'classTask.php';

session_start();

use TasksClass\TasksClass;

//add Title for task

if (isset($_POST['addTask'])) {
    $task = new TasksClass();
    $title = $_POST['addTask'];
    $task->addTasks($title);
    header("Location:index.php");
}

if (isset($_GET['id'])) {
    $task = new TasksClass();
    $title = $_GET['id'];    
    header("Location:index.php?id=" . $_GET['id']);
}

if (isset($_POST['status'])) {
    $task = new TasksClass();
    $id = $_POST['id'];
    $status = $_POST['status'];
    $task->markComplete($id, $status);
    header("Location:index.php");
}

if (isset($_POST['duedate'])) {
    $task = new TasksClass();
    $duedate = $_POST['duedate'];
    $id = $_POST['id'];
    $task->duedate($id, $duedate);
    header("Location:index.php?id=" . $_POST['id']);
}
?>