<?php
/*
Script that returns the array of entries from json file, reverses them and starts displaying them
one by one as divs. If no entries exist yet, returns a simple message.
Original source of the script: Allan Nurymov
*/

$entries = json_decode(file_get_contents("js/entries.json"), false);
if (isset($entries) && count($entries) != 0) {
    foreach (array_reverse($entries) as $entry) {
        echo '<a href="task_details.php?id=' . urlencode($entry->id) . '">';
        ?>
        <div class="entry">
            <div class="content">
                <div class="taskname"> <?php echo $entry->taskname; ?></div>
                <div class="importance"> <?php echo ("Importance: ". $entry->importance); ?> </div>
                <div class="deadline"> <?php echo ("Deadline: ". $entry->deadline); ?> </div>
                <div class="done"> <?php echo (($entry->done) ? '<span style="color:green;">Finished</span>' : '<span style="color:red;">Unfinished</span>'); ?> </div>
            </div>
        </div>
        <?php
        echo '</a>';
    }
} else {
    echo "<center><p> looks like you have nothing to do.. </p><center>";
}
?>