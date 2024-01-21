/*
Script that uses AJAX to send data to the server using a HTTP POST request when form is submitted.
The sent message gets erased, the name stays the same.
Original source of the script: https://api.jquery.com/jquery.post/
Used and modified by: Allan Nurymov
*/

$(function () {
  $('form').on('submit', function (e) {
    var dataString = $('form').serialize();
    var taskname_value = $('form').find("input[name='taskname']").val();
    var description_value = $('form').find("textarea[name='description']").val();
    var deadline_value = $('form').find("input[name='deadline']").val();
    var importance_value = $('form').find("input[name='importance']").val();

    if (taskname_value.trim() == "" || description_value.trim() == ""|| deadline_value.trim() == "" || importance_value.trim() == "") {
      document.getElementById("taskname").value = "";
      document.getElementById("description").value = "";
      document.getElementById("importance").value = 0;
      document.getElementById("range_value").innerText = 0;
      document.getElementById("chars_left_taskname").innerHTML = "32";
      document.getElementById("chars_left_description").innerHTML = "512";

      Swal.fire({
        icon: 'error',
        title: 'Hey!',
        text: "Don't add empty tasks!"
      })
    }
    else {
      document.getElementById("taskname").value = "";
      document.getElementById("description").value = "";
      document.getElementById("importance").value = 0;
      document.getElementById("range_value").innerText = 0;
      document.getElementById("chars_left_taskname").innerHTML = "32";
      document.getElementById("chars_left_description").innerHTML = "512";

      $.ajax({
        type: 'POST',
        url: 'submit.php',
        data: dataString
      });

      Swal.fire({
        icon: 'success',
        title: 'Sucess!',
        text: "New task was successfully added!"
      })
    }

    e.preventDefault();
  });
});