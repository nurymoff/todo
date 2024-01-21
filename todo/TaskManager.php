<?php

/*
Class TaskManager has an attribute of an array of tasks
It has 3 methods:
-getTasks returns the array of tasks
-loadTasks loads those tasks from a JSON file
-getTaskById goes through the task array and looks for the one with matching ID
*/

class TaskManager
{
    // Array of tasks
    private $tasks = [];

    // Constructor to load tasks from a JSON file
    public function __construct()
    {
        $this->loadTasks('js\entries.json');
    } 
	
    // Return the array of tasks
    public function getTasks()
    {
        return $this->tasks;
    }

	// Load tasks from the JSON file
    private function loadTasks($file)
    {
        $json = file_get_contents($file);
        $this->tasks = json_decode($json, false) ?: [];
    }	

    // Return a task with a matching ID
    public function getTaskById($taskId)
    {
        foreach ($this->tasks as $task) {
            if ($task->id == $taskId) {
                return $task;
            }
        }
        return null;
    }
}
    
?>
