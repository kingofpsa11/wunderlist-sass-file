<?php
namespace TasksClass;


class TasksClass
{
    public $id;
    public $title;
    public $detail_date;
    public $detail_reminder;
    public $subtasks_id;
    public $note;
    public $list_id;

    public function getAllTasks()
    {
        
    }

    public function addTasks($title)
    {
        
        $_SESSION['database'][$title] = ['title' => $title, 'duedate' => '', 'reminder_date' => ''];
    }

    public function detailTask($id)
    {
        $_SESSION['click'] = $_SESSION['database'][$id];
    }

    public function markComplete($id)
    {   
        include('connection.php');
        $sql = "UPDATE tasks 
                SET status='done'
                WHERE id=" . $id;
        $conn->query($sql);
        $conn->close();
    }

    public function markNotComplete($id)
    {
        include('connection.php');
        $sql = "UPDATE tasks 
                SET status='doing'
                WHERE id=" . $id;
        $conn->query($sql);
        $conn->close();
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