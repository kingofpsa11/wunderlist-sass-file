<?php
class TaskModel
{
    protected $_id;
    protected $_title;

    public function setId($id)
    {
        $this->_id = $id;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setTitle($title)
    {
        $this->_title = $title;
    }

    public function getTitle()
    {
        return $this->_title;
    }
}


class Task extends TaskModel
{
    protected $_due_date;
    protected $_reminder_date;
    protected $_sub_tasks;
    protected $_list_id;
    protected $_status;

    /**
     * @param $due_date
     */
    public function setDueDate($due_date)
    {
        $this->_due_date = $due_date;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->_due_date;
    }

    public function setReminderDate($reminder_date)
    {
        $this->_reminder_date = $reminder_date;
    }

    public function getReminderDate()
    {
        return $this->_reminder_date;
    }

    public function setSubTasks($sub_tasks)
    {
        $this->_sub_tasks = $sub_tasks;
    }

    public function getSubTasks()
    {
        return $this->_sub_tasks;
    }

    public function getListId()
    {
        return $this->_list_id;
    }

    public function setListId($list_id)
    {
        $this->_list_id = $list_id;
    }

    public function getStatus()
    {
        return $this->_status;
    }

    public function setStatus($status)
    {
        $this->_status = $status;
    }


    /**
     * @param $title
     */
    public function addSubTask($title)
    {
        $this->_sub_tasks[] = [$title,1];
    }

    public function changeSubTask($oldTitle, $newTitle)
    {
        $sub_tasks = $this->_sub_tasks;
        $key = array_search($oldTitle, array_column($sub_tasks, '0'));
        $sub_tasks[$key] = [$newTitle, $sub_tasks[$key][1]];
        $this->_sub_tasks = $sub_tasks;
    }

    public function changeStatusSubTask($title)
    {
        $sub_tasks = $this->_sub_tasks;
        $key = array_search($title, array_column($sub_tasks,'0'));
        if ($sub_tasks[$key][1] == 1) {
            $sub_tasks[$key][1] = 0;
        } else {
            $sub_tasks[$key][1] = 1;
        }
        $this->_sub_tasks = $sub_tasks;
    }

    public function changeStatus()
    {
        if ($this->_status == 1) {
            $this->_status = 0;
        } else {
            $this->_status = 1;
        }
    }
}

class ListTask
{
    protected $_id;
    protected $_list;

    public function getId()
    {
        return $this->_id;
    }

    public function setId($id)
    {
        $this->_id = $id;
    }

    public function setTitle($title)
    {
        $this->_list = $title;
    }

    public function getTitle()
    {
        return $this->_list;
    }

}

class Storage
{
    
    public function addTask(Task $task)
    {
        $tasks = $this->getAllTasks() ;
        $lastTask = end($tasks);
        $array = [];
        $array['id'] = $lastTask['id'] + 1;
        $array['title'] = $task->getTitle();
        $array['duedate'] = null;
        $array['reminder_date'] = null;
        $array['list_id'] = $task->getListId();
        $array['subtasks'] = [];
        $array['status'] = 1;
        $_SESSION['tasks'][] = $array;
    }

    public function getTask($id)
    {
        $tasks = $this->getAllTasks();
        $task = new Task();
        foreach ($tasks as $value) {
            if ($value['id'] == $id) {
                $task->setId($value['id']);
                $task->setTitle($value['title']);
                $task->setDuedate($value['duedate']);
                $task->setReminderDate($value['reminder_date']);
                $task->setSubtasks($value['subtasks']);
                $task->setListId($value['list_id']);
                $task->setStatus($value['status']);
            }
        }
        return $task;
    }

    public function saveTask(Task $task)
    {
        $tasks = $this->getAllTasks();
        foreach ($tasks as $key => $value) {
            if ($value['id'] == $task->getId()) {
                $value['title'] = $task->getTitle();
                $value['duedate'] = $task->getDuedate();
                $value['reminder_date'] = $task->getReminderDate();
                $value['subtasks'] = $task->getSubtasks();
                $value['list_id'] = $task->getListId();
                $value['status'] = $task->getStatus();
                $tasks[$key] = $value;
            }
        }
        $_SESSION['tasks'] = $tasks;
    }

    public function addList(ListTask $list)
    {
        $lastList = end($this->getAllLists()) ;
        $array = [];
        $array['id'] = $lastList['id'] + 1;
        $array['title'] = $list->getTitle();
        $_SESSION['tasks'][] = $array;
    }

    public function getList($list_id)
    {
        $lists = $this->getAllLists();
        $list = new ListTask();
        foreach ($lists as $value) {
            if ($value['id'] == $list_id) {
                $list->setId($value['id']);
                $list->setTitle($value['title']);
            }
        }
        return $list;
    }

    public function getAllTasks()
    {
        return $_SESSION['tasks'];
    }

    public function getAllLists()
    {
        return $_SESSION['list'];
    }

}

?>
