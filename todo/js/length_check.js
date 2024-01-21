/*
Script that calculates the amount of characters left for name input and message textarea,
displaying the number and changing it's color depending on the amount.
Original source of the script: Allan Nurymov
*/


var taskname = document.getElementById('taskname');
var description = document.getElementById('description');


window.onload = tasknameLengthCheck();
window.onload = descriptionLengthCheck();

function tasknameLengthCheck() {
    var taskname_length = taskname.value.length;
    var characters_left_taskname = 32 - taskname_length;
    var count_taskname = document.getElementById("chars_left_taskname");
    count_taskname.innerHTML = characters_left_taskname;
    switch (false) {
        case (characters_left_taskname > 8):
            count_taskname.style.color = "red";
            break;
        case (characters_left_taskname > 16):
            count_taskname.style.color = "orange";
            break;
        case (characters_left_taskname > 24):
            count_taskname.style.color = "yellow";
            break;
        default:
            count_taskname.style.color = "greenyellow";
    }
}

function descriptionLengthCheck() {
    var description_length = description.value.length;
    var characters_left_description = 512 - description_length;
    var count_description = document.getElementById("chars_left_description");
    count_description.innerHTML = characters_left_description;
    switch (false) {
        case (characters_left_description > 32):
            count_description.style.color = "red";
            break;
        case (characters_left_description > 128):
            count_description.style.color = "orange";
            break;
        case (characters_left_description > 256):
            count_description.style.color = "yellow";
            break;
        default:
            count_description.style.color = "greenyellow";
    }
}

taskname.addEventListener('keyup', tasknameLengthCheck, false);
taskname.addEventListener('keydown', tasknameLengthCheck, false);
description.addEventListener('keyup', descriptionLengthCheck, false);
description.addEventListener('keydown', descriptionLengthCheck, false);
