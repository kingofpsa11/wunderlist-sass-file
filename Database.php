<?php
namespace DatabaseClass;

class DatabaseClass
{    
    public function addTasks($title)
    {
        $id = count($_SESSION['database']) + 1;
        $_SESSION['database'][$id] = ['id' => $id, 'title' => $title, 'duedate' => '', 'reminder_date' => '', 'status' => 1];
    }
    
    public function markComplete($id, $status)
    {   
        if ($status == '1' ) {
            $value = $_SESSION['database'][$id]['status'];
            $_SESSION['database'][$id]['status'] = 0;
        } else {
            $_SESSION['database'][$id]['status'] = 1;
        }
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