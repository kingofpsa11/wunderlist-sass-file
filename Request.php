<?php
include 'TaskModel.php';

//create new Task
if (isset($_POST['addTask'])) {
    $title = $_POST['addTask'];
    $id = $_POST['id'];

    $task = new Task();
    $task->setTitle($title);
    $task->setListId($id);

    $storage = new Storage();
    $storage->addTask($task);
}

//Change status of Task
if (isset($_POST['status'])) {
   $id = $_POST['id'];   

   $task = new Task();
   $storage = new Storage();
   $task = $storage->getTask($id);
   $task->changeStatus();
   $storage->saveTask($task);
}

//Change duedate
if (isset($_POST['duedate'])) {
    $id = $_POST['id'];
    $duedate = $_POST['duedate'];
    $task = new Task();
    $storage = new Storage();
    $task = $storage->getTask($id);
    $task->setDuedate($duedate);
    $storage->saveTask($task);
}

if (isset($_POST['addSubtask'])) {
    $id = $_POST['id'];
    $title = $_POST['addSubtask'];

    $task = new Task();
    $storage = new Storage();

    $task = $storage->getTask($id);
    $task->addSubtask($title);
    $storage->saveTask($task);
}


if (isset($_POST['statusSubtaskTitle'])) {
    $id = $_POST['id'];
    $title = $_POST['statusSubtaskTitle'];

    $task = new Task();
    $storage = new Storage();

    $task = $storage->getTask($id);
    $task->changeStatusSubtask($title);
    $storage->saveTask($task);
}
// TaskModel { // present SubTask
//     id;
//     title;
// }

// Task extends TaskModel { // Present Task
//     date;
//     arrayOfTaskModel;

// setTitle()

// setDate()

// getDate();


//     addSubTask(title) {
//         // add subtask into arrayOfTaskModel;
//     }

//     removeSubTask(id);

//     saveSubTask(TaskModel)

//     removeSubTask(id);
// }

// List {
//     arrayOfTask;

//     getTasks();

//     getTask(id);
// }

// Storage {
//     // Use session to store data

//     addTask(Task) {
//         // Save task into session
//     }

//     Task getTask(id) {
//         // get task information from session and return Task object;
//     }

//     save(Task) {
//         // save Task into session
//     }

//     ArrayOfTasks getAllTasks();

//     removeTask(id);

//     getAllLists();

//     List getList(id);

// }
?>