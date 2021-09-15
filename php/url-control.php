<?php
    include "config.php";
    // Getting the value which are sending from AJAX to JS 
    $full_url = mysqli_real_escape_string($conn, _$POST['full-url']);

    // if the full url box is not empty and the user entered url is valid url
    if(!empty($full_url) && filter_var($full_url, FILTER_VALIDATE_URL)) {
        $ran_url = substr(md5(microtime()), rand(0, 26), 5); // generating random 5 characters URL 
        //$sql = mysqli_query($conn, "SELECT ");
    } else {
        echo "$full_url - This is not a valid URL !";
    }
?>