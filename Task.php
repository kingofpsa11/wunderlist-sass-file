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
    public $subtasks;
    
    public function __contruct()
    {
        $this->id = $array['id'];
        $this->title = $array['title'];
    }
    

    public function addTask()
    {
        $task = new Database();
        $task->addTask($this->title);
    }    
    
    public function getTask()
    {
        $task = new Database();
        $task = $task->getTask($this->id);
        $this->id = $task['id'];
        $this->title = $task['title'];
        $this->duedate = $task['duedate'];
        $this->reminder_date = $task['reminder_date'];
        $this->subtasks = $task['subtasks'];
        $this->note = $task['note'];
        return $this;
    }

    public function changeDuedate()
    {
        $task = new Database();
        $value = $this->getTask($this->id);
        $value['duedate'] = $this->duedate;
        $task->saveTask($value);
    }

    public function changeStatus()
    {
        $task = new Database();
        $value = $this->getTask($this->id);

        if($this->status == '0') {
            $this->status = '1';
        } else {
            $this->status = '0';
        }

        $value['status'] = $this->status;
        $task->saveTask($value);
    }

    public function addSubtask()
    {
        $task = new Database();
        $value = $this->getTask($this->id);
        $subtasks = $value['subtasks'];
        
    }
}

?>