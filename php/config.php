<?php 
    $domain = "localhost:8080/short.me/shortme.php";
    $host = "localhost";
    $user = "root"; //Database username
    $pass = ""; //Database password
    $db = "shortMe"; //Database name

    $conn = mysqli_connect($host, $user, $pass, $db);
    if(!$conn){
        echo "Database connection error".mysqli_connect_error();
    }
?>