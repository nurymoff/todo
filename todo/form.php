<!-- Simple form that takes the info (taskname, description, deadline, importance and starts the form_add.js script -->

<section id="form">
    <form>
        <div class="form_info"><label>enter your task's name.</label><span id="chars_left_taskname"></span></div>
        <input type="text" name="taskname" id="taskname" placeholder="enter your task's name." maxlength="32" required>
        
        <div class="form_info"><label>enter your task's description.</label><span id="chars_left_description"></span></div>
        <textarea id="description" name="description" placeholder="enter your tasks's description." maxlength="512" rows="4" required></textarea>

        <div class="form_info"><label>select your task's deadline</label><span id="chars_left_message"></span></div>         
        <input type="date" id="deadline" name="deadline" value="<?php echo date("Y-m-d"); ?>" placeholder="Deadline" required>
        
        <div class="form_info"><label>pick your task's importance (10 highest).</label><span id="chars_left_message"></span></div>
            
        <div class="range_output">
            <input type="range" id="importance" name="importance" min="0" max="10" value="0" required oninput="range_value.innerText = this.value">
            <div id="range_value">0</div>
        </div>

        <input type="submit" name="submit" value="submit new task.">
    </form>
</section>