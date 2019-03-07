<?php
namespace Controller;

include 'Task.php';

use Model\Task;

class TaskController
{     
    public $id;
    public $title;
    public $duedate;
    public $reminder_date;
    public $subtasks;
    public $note;
    public $file;

    public function addTask()
    {
       
    }
    
    public function changeStatus($id)
    {   
        $task = new Task();
        $task = $task->getTaskById($id);

    }

    // Save duedate to SESSION
    public function duedate($id, $duedate)
    {
        $_SESSION['database'][$id]['duedate'] = $duedate;
    }

    public function markStarred($id)
    {

    }
    
    public function dueToday($id)
    {

    }

    public function dueTomorrow($id)
    {
        
    }

    public function removeDueDate($id)
    {

    }

    public function moveTodoTo($id, $list_id)
    {

    }

    public function copyTodo($id)
    {

    }

    public function pasteTodo($id)
    {

    }
}

?>