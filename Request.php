<?php

session_start();

include 'TaskModel.php';

$li = '<li class="section-item subtask">
<div class="section-icon">
    <a class="subtask-checkbox checkBox">
        <svg class="task-check" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:1.41421;"> <g> <path d="M17.5,4.5c0,-0.53 -0.211,-1.039 -0.586,-1.414c-0.375,-0.375 -0.884,-0.586 -1.414,-0.586c-2.871,0 -8.129,0 -11,0c-0.53,0 -1.039,0.211 -1.414,0.586c-0.375,0.375 -0.586,0.884 -0.586,1.414c0,2.871 0,8.129 0,11c0,0.53 0.211,1.039 0.586,1.414c0.375,0.375 0.884,0.586 1.414,0.586c2.871,0 8.129,0 11,0c0.53,0 1.039,-0.211 1.414,-0.586c0.375,-0.375 0.586,-0.884 0.586,-1.414c0,-2.871 0,-8.129 0,-11Z" style="fill:none;stroke-width:1px"></path> </g> </svg>
        <svg class="task-checked" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;"> <g> <path d="M9.5,14c-0.132,0 -0.259,-0.052 -0.354,-0.146c-1.485,-1.486 -3.134,-2.808 -4.904,-3.932c-0.232,-0.148 -0.302,-0.457 -0.153,-0.691c0.147,-0.231 0.456,-0.299 0.69,-0.153c1.652,1.049 3.202,2.266 4.618,3.621c2.964,-4.9 5.989,-8.792 9.749,-12.553c0.196,-0.195 0.512,-0.195 0.708,0c0.195,0.196 0.195,0.512 0,0.708c-3.838,3.837 -6.899,7.817 -9.924,12.902c-0.079,0.133 -0.215,0.221 -0.368,0.24c-0.021,0.003 -0.041,0.004 -0.062,0.004"></path> <path d="M15.5,18l-11,0c-1.379,0 -2.5,-1.121 -2.5,-2.5l0,-11c0,-1.379 1.121,-2.5 2.5,-2.5l10,0c0.276,0 0.5,0.224 0.5,0.5c0,0.276 -0.224,0.5 -0.5,0.5l-10,0c-0.827,0 -1.5,0.673 -1.5,1.5l0,11c0,0.827 0.673,1.5 1.5,1.5l11,0c0.827,0 1.5,-0.673 1.5,-1.5l0,-9.5c0,-0.276 0.224,-0.5 0.5,-0.5c0.276,0 0.5,0.224 0.5,0.5l0,9.5c0,1.379 -1.121,2.5 -2.5,2.5"></path> </g> </svg>
    </a>
</div>
<div class="section-content">
    <div class="section-title">
        <div class="content-fakable">
            <div class="display-view">
                <span></span>
            </div>
            <div class="edit-view hidden">
                <div class="expandingArea">
                    <pre style="line-height:20px;font-size:15px;"></pre>
                    <textarea style="line-height:20px;font-size:15px;" name="editSubtask"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
</li>';
$checkbox = '<a class="taskItem-checkboxWrapper"><span>
<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
width="20px" height="20px" viewBox="0 0 400 400" style="enable-background:new 0 0 400 400;"
xml:space="preserve">
<g stroke="none" stroke-width="1" fill-rule="evenodd"> <g>
    <g>
        <path d="M377.87,24.126C361.786,8.042,342.417,0,319.769,0H82.227C59.579,0,40.211,8.042,24.125,24.126
            C8.044,40.212,0.002,59.576,0.002,82.228v237.543c0,22.647,8.042,42.014,24.123,58.101c16.086,16.085,35.454,24.127,58.102,24.127
            h237.542c22.648,0,42.011-8.042,58.102-24.127c16.085-16.087,24.126-35.453,24.126-58.101V82.228
            C401.993,59.58,393.951,40.212,377.87,24.126z M365.448,319.771c0,12.559-4.47,23.314-13.415,32.264
            c-8.945,8.945-19.698,13.411-32.265,13.411H82.227c-12.563,0-23.317-4.466-32.264-13.411c-8.945-8.949-13.418-19.705-13.418-32.264
            V82.228c0-12.562,4.473-23.316,13.418-32.264c8.947-8.946,19.701-13.418,32.264-13.418h237.542
            c12.566,0,23.319,4.473,32.265,13.418c8.945,8.947,13.415,19.701,13.415,32.264V319.771L365.448,319.771z"/>
    </g>

</svg>
</span></a>';
$doneCheckbox = '<a class="taskItem-checkboxWrapper"><span>
<svg class="task-checked" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;"> <g> <path d="M9.5,14c-0.132,0 -0.259,-0.052 -0.354,-0.146c-1.485,-1.486 -3.134,-2.808 -4.904,-3.932c-0.232,-0.148 -0.302,-0.457 -0.153,-0.691c0.147,-0.231 0.456,-0.299 0.69,-0.153c1.652,1.049 3.202,2.266 4.618,3.621c2.964,-4.9 5.989,-8.792 9.749,-12.553c0.196,-0.195 0.512,-0.195 0.708,0c0.195,0.196 0.195,0.512 0,0.708c-3.838,3.837 -6.899,7.817 -9.924,12.902c-0.079,0.133 -0.215,0.221 -0.368,0.24c-0.021,0.003 -0.041,0.004 -0.062,0.004"></path> <path d="M15.5,18l-11,0c-1.379,0 -2.5,-1.121 -2.5,-2.5l0,-11c0,-1.379 1.121,-2.5 2.5,-2.5l10,0c0.276,0 0.5,0.224 0.5,0.5c0,0.276 -0.224,0.5 -0.5,0.5l-10,0c-0.827,0 -1.5,0.673 -1.5,1.5l0,11c0,0.827 0.673,1.5 1.5,1.5l11,0c0.827,0 1.5,-0.673 1.5,-1.5l0,-9.5c0,-0.276 0.224,-0.5 0.5,-0.5c0.276,0 0.5,0.224 0.5,0.5l0,9.5c0,1.379 -1.121,2.5 -2.5,2.5"></path> </g> </svg>
</span></a>';

//create new Task
if (isset($_POST['addTask'])) {
    $title = $_POST['addTask'];
    $listId = $_POST['listId'];

    $task = new Task();
    $task->setTitle($title);
    $task->setListId($listId);

    $storage = new Storage();
    $storage->addTask($task);
    echo $task->getId();
}

//Display detail of task

if (isset($_GET['taskId'])) {
    $id = $_GET['taskId'];

    $task = new Task();
    $storage = new Storage();

    $task = $storage->getTask($id);
    $value = $task->getTaskJson();
    echo $value;
}

//Change status of Task
if (isset($_POST['checkTask'])) {
   $id = $_POST['checkTask'];

   $task = new Task();
   $storage = new Storage();
   $task = $storage->getTask($id);
   $task->changeStatus();
   $storage->saveTask($task);
   if ($task->getStatus() == 1) {
       echo $checkbox;
   } elseif ($task->getStatus() == 0) {
       echo $doneCheckbox;
   }
}

//Change due date
if (isset($_POST['detail_date'])) {
    $id = $_POST['detail_date_id'];
    $duedate = $_POST['detail_date'];
    $task = new Task();
    $storage = new Storage();
    $task = $storage->getTask($id);
    $task->setDuedate($duedate);
    $storage->saveTask($task);
}

// Add subtask
if (isset($_POST['addSubTask'])) {
    $id = $_POST['id'];
    $title = $_POST['addSubTask'];

    $task = new Task();
    $storage = new Storage();

    $task = $storage->getTask($id);
    $task->addSubtask($title);
    $storage->saveTask($task);
    echo $li;
}

//return $li
if (isset($_GET['li'])) {
    echo $li;
}

if (isset($_POST['changeStatusSubtask'])) {
    $taskId = $_POST['changeStatusSubtask'];
    $title = $_POST['subtaskTitle'];

    $task = new Task();
    $storage = new Storage();

    $task = $storage->getTask($taskId);
    $task->changeStatusSubtask($title);
    $storage->saveTask($task);
}

if (isset($_POST['editSubtask'])) {
    $id = $_POST['id'];
    $newTitle = $_POST['editSubtask'];
    $oldTitle = $_POST['oldTitle'];
    $task = new Task();
    $storage = new Storage();

    $task = $storage->getTask($id);
    $task->changeSubtask($oldTitle, $newTitle);
    $storage->saveTask($task);
}


//Change language
if (isset($_POST['lang'])) {
    $lang = "./translate/" . $_POST['lang'] . ".txt";
    $file = fopen($lang, "r");
    $filesize = filesize($lang);
    $content = fread($file, filesize($lang));
    $_SESSION['lang'] = $_POST['lang'];
    fclose($file);
    echo $content;
}

// Create List Name
if (isset($_POST['addListName'])) {
    $listName = $_POST['addListName'];

    $list = new ListTask();
    $storage = new Storage();

    $list->setTitle($listName);
    $storage->addList($list);
}

if (isset($_FILES["file"])) {
    
    $file = $_FILES["file"];
    $tempFile = $file['tmp_name'];
    move_uploaded_file($tempFile, "uploads/" . $file['name']);
    echo "upload file";
}
?>