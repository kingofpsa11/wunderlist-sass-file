<?php
namespace Database;

class Database
{
    public $tasks;
    public $lists;

    public function __construct($array)
    {
        if (isset($_SESSION['database']['tasks'])) {
            $this->tasks = $_SESSION['database']['tasks'];    
        }
        if (isset($_SESSION['database']['lists'])) {
            $this->lists = $_SESSION['database']['lists'];
        }        
    }
    
    public function addTask($title)
    {
        $tasks = $this->tasks;
        $count = count($tasks);
        $id = $count + 1;
        $task['id'] = strval($id);
        $task['title'] = $title;
        $task['duedate'] = '';
        $task['reminder_date'] = '';
        $task['status'] = 1;
        $_SESSION['database']['tasks'][$id] = $task;
    }

    public function getTask($id)
    {
        $task = $this->tasks[$id];
        return $task;
    }

    public function saveTask($task)
    {
        $_SESSION['database']['tasks'][$task['id']] = $task;
    }

}

?>