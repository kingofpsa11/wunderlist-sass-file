<?php
namespace Model;

include 'Database.php';

use Database\Database;

class Task
{
    public $id;
    public $title;
    public $status;
    public $duedate;
    public $reminder_date;
    public $note;    
    
    public function addTask()
    {
        $task = new Database();
        $task->addTask($this->title);
    }    
    
    public function getTask()
    {
        $task = new Database();
        $task = $task->getTask($this->id);
        return $task;
    }

    public function changeDuedate()
    {
        $task = new Database();
        $array = $this->getTask();
        
        $array['duedate'] = $this->duedate;

        $task->saveTask($array);
    }

    public function changeStatus()
    {
        $task = new Database();
        $value = $this->getTask();

        if($this->status == '0') {
            $this->status = '1';
        } else {
            $this->status = '0';
        }

        $value['status'] = $this->status;
        $task->saveTask($value);
    }
}

?>