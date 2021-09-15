<?php
    $conn = mysqli_connect("localhost", "root", "", "shortMe");
    if(!$conn) { // if database is not connected
        echo "DataBase connection error".mysqli_connect_error();
    }
?>