<?php
/*
Script that starts when button is pressed and POST data sent via change_status.js.
Takes the POST data (id_value) and loads the json file values
It then checks if the "done" status of the entry is true or false and depending on the value it sets the other one.
Array then gets encoded and saved into entries.json.
Original source of the script: Allan Nurymov
*/

$file = "js/entries.json";

if (isset($_POST['id_value'])) {
    $requested_id = $_POST['id_value'];
    echo "Received id_value: " . $requested_id;
} else {
    echo "id_value not set";
}

$old_records = json_decode(file_get_contents($file), true);

if ($old_records[$requested_id-1]['done'])
{
    $old_records[$requested_id-1]['done'] = false;
}
else {
	$old_records[$requested_id-1]['done'] = true;
}
$data_to_save = $old_records;
file_put_contents($file, json_encode($data_to_save, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX);