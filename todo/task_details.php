<?php
require_once 'Task.php';
require_once 'TaskManager.php';

// Get the task ID from the URL parameter
$taskId = $_GET['id'] ?? '';

 // Create TaskManager instance
    $taskManager = new TaskManager();

// Get the task details based on the task ID
$entry = $taskManager->getTaskById($taskId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="description" content="Chatting website for a school project.">
	<meta property="og:image" content="img/gigachad.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/gigachad.jpg">
    <link rel="stylesheet" href="css\styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="js/change_status.js"></script> 

    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
   
    <title>task details.</title>
</head>
<body>

	<!-- start of header -->
	<?php require("header.php"); ?>
	<!-- end of header -->

    <!-- start of entry details -->
    <div class="detailed_entry">
       <?php
           if ($entry) { 
                echo '<div class="entry_info">';
                    echo '<div class="taskname"> Task name: '. $entry->taskname . '</div>';
                    echo '<div class="description"> Task description: '. $entry->description . '</div>';
                    echo '<div class="deadline"> Task deadline: '. $entry->deadline . '</div>';
                    echo '<div class="importance" > Task importance: '. $entry->importance . '</div>';
                    echo '<div class="done"> Task status: <span id="status>"'.(($entry->done) ? '<span style="color:green;">Finished</span>' : '<span style="color:red;">Unfinished</span>') . '</span></div>';
                echo '</div>';
                echo '<div class="entry_functions">';
                    echo '<button onclick="changeStatus()">Change status</button>';
                    echo '<button onclick="location.href=\'index.php\'">Go back</button>';
                echo '</div>';
            } else {
                echo '<div class="entry>"';
                echo '<p>Task not found</p>';
                echo '</div>';
            }
        ?>
    </div>
    <!-- end of entry details -->

    <!-- start of footer -->
	<?php require("footer.php"); ?>
	<!-- end of footer -->

    <!-- start of links to own scripts -->
	<script src="js/animated_title.js"></script>
	<!-- end of links to own scripts -->

</body>
</html>
