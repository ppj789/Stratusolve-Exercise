<?php
/**
 * This class handles the modification of a task object
 */
class Task {
    public $TaskId;
    public $TaskName;
    public $TaskDescription;
    protected $TaskDataSource;
    public function __construct($Id = null) {
        $this->TaskDataSource = file_get_contents('Task_Data.txt');
        if (strlen($this->TaskDataSource) > 0)
            $this->TaskDataSource = json_decode($this->TaskDataSource); // Should decode to an array of Task objects
        else
            $this->TaskDataSource = array(); // If it does not, then the data source is assumed to be empty and we create an empty array

        if (!$this->TaskDataSource)
            $this->TaskDataSource = array(); // If it does not, then the data source is assumed to be empty and we create an empty array
        if (!$this->LoadFromId($Id))
            $this->Create();
    }
    protected function Create() {
        // This function needs to generate a new unique ID for the task
        // Assignment: Generate unique id for the new task
        $this->TaskId = $this->getUniqueId();
        $this->TaskName = 'New Task';
        $this->TaskDescription = 'New Description';
    }
    protected function getUniqueId() {
        // Assignment: Code to get new unique ID
        return uniqid();
    }
    protected function LoadFromId($Id = null) {
        if ($Id) {
            // Assignment: Code to load details here...
            $taskArray = $this->TaskDataSource;
            foreach ($taskArray as $task) {
                if($task->TaskId == $_GET['id']){
                   $html ="<div class='col-md-12' style='margin-bottom: 5px;'>
                           <input type='hidden' name='task_id' value='$task->TaskId' class='form-control'>
                           <input type='text' name='task_name' value='$task->TaskName' class='form-control'>
                           </div>
                           <div class='col-md-12'>
                           <textarea id='InputTaskDescription' name='task_desc' class='form-control'>$task->TaskDescription</textarea>
                           </div>";
                }
            }
        } else
            return null;
    }

    public function Save() {
        //Assignment: Code to save task here
    }
    public function Delete() {
        //Assignment: Code to delete task here
    }
}
?>
