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
    
    $task->subtask = $_POST['subtask'];
    $task->id = $_POST['id'];

    $task->addSubtask();
}

TaskModel { // present SubTask
    id;
    title;
}

Task extends TaskModel { // Present Task
    date;
    arrayOfTaskModel;

setTitle()

setDate()

getDate();


    addSubTask(title) {
        // add subtask into arrayOfTaskModel;
    }

    removeSubTask(id);

    saveSubTask(TaskModel)

    removeSubTask(id);
}

List {
    arrayOfTask;

    getTasks();

    getTask(id);
}

Storage {
    // Use session to store data

    addTask(Task) {
        // Save task into session
    }

    Task getTask(id) {
        // get task information from session and return Task object;
    }

    save(Task) {
        // save Task into session
    }

    ArrayOfTasks getAllTasks();

    removeTask(id);

    getAllLists();

    List getList(id);

}


function getAllTasks() {

}

?>