<?php
/*
Class Task has these attributes:
-id = identifier of the task
-taskname = Name of the task
-description = more information about the task, visible when clicking the task
-deadline = date
-importance = how important the task is 
-done = determines if the task has been finished or no

The methods are mostly getters, and one setter to set the id by autoincrement
Another method here is jsonSerialize that allows us to encode php object data into json
*/

class Task implements JsonSerializable
{
    private $id;
    private $taskname;
    private $description;
    private $deadline;
    private $importance;
    private $done;

    // Create a task with id = 0, given values from the form and default "done" status as false
    public function __construct($taskname, $description, $deadline, $importance, $done = false)
    {
        $this->id = 0;
        $this->taskname = $taskname;
        $this->description = $description;
        $this->deadline = $deadline;
        $this->importance = $importance;
        $this->done = $done;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDeadline()
    {
        return $this->deadline;
    }

    public function getImportance()
    {
        return $this->importance;
    }

    public function isDone()
    {
        return $this->done;
    }	

    public function setId($id)
    {
        $this->id = $id;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
	
}
?>
