/*
Script that uses AJAX to send data to the server using a HTTP POST request when a button is clicked.
Original source of the script: https://api.jquery.com/jquery.post/
Used and modified by: Allan Nurymov
*/

var id_value = new URL(location.href).searchParams.get("id");

function changeStatus() {
        $.ajax({
            type: 'POST',
            url: 'change_status.php',
            data: { id_value: id_value },
         });

        Swal.fire({
            icon: 'success',
            title: 'Sucess!',
            text: "Status of the task has been changed!"
        })
}