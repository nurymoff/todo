<?php
/*
Script that starts when form is submitted and POST data sent via form_add.js.
Takes the POST data (taskname, description, deadline, importance) and filters them and puts it all in an array.
Then it checks if the entry is the very first.
If so, adds "id" of 1 to the first entry and puts it into another array to save.
If not, takes the old entries from decoded entries.json file, checks the last entry and takes it's id,
adds new id to the new task and adds it all into the array to save.
Array then gets encoded and saved into entries.json.
Original source of the script: Allan Nurymov
*/

require("Task.php");

$file = "js/entries.json";

$taskname = filter_input(INPUT_POST, "taskname", FILTER_SANITIZE_SPECIAL_CHARS);
$description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
$deadline = filter_input(INPUT_POST, "deadline", FILTER_SANITIZE_SPECIAL_CHARS);
$importance = filter_input(INPUT_POST, "importance", FILTER_SANITIZE_SPECIAL_CHARS);

$new_task = new Task(
	$taskname,
	$description,
	$deadline,
	$importance
);

if (filesize($file) == 0) {
	$new_task->setId(1);

	$first_record = array($new_task);
	$data_to_save = $first_record;
} else {
	$old_records = json_decode(file_get_contents($file), true);
	$last_record = end($old_records);
	var_dump($last_record);
	$new_task->setId($last_record['id'] +1);

	var_dump($new_task);

	array_push($old_records, $new_task);
	$data_to_save = $old_records;
	var_dump($data_to_save);
}

file_put_contents($file, json_encode($data_to_save, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX);