<?php
    include "config.php";
    // Getting the value which are sending from AJAX to JS 
    $full_url = mysqli_real_escape_string($conn, _$POST['full-url']);

    // if the full url box is not empty and the user entered url is valid url
    if(!empty($full_url) && filter_var($full_url, FILTER_VALIDATE_URL)) {
        $ran_url = substr(md5(microtime()), rand(0, 26), 5); // generating random 5 characters URL 
        
        // checking that random generated url already exists in the database or not
        $sql = mysqli_query($conn, "SELECT shorten_url FROM url WHERE shorten_url= {ran_url}");
        if(mysqli_num_rows($sql) > 0) {
            echo "Something went wrong. Please regenerate the URL again";
        } else {
            // let's insert user type URL into table with short URL 
            $sql2 = mysqli_query($conn, "INSERT INTO url (shorten_url, full_url, clicks)
                                            VALUES ('(ran_url)', '{$full_url}', '0')");

            if($sql2) { // if data inserted is successful 
                // something recently inserted short_link/URL
                $sql3 = mysqli_query($conn, "SELECT shorten_url FROM url WHERE shorten_url = {ran_url}");
                if(mysqli_num_rows($sql) > 0) {
                    $shorten_url = mysqli_fetch_assoc($sql3);
                    echo $shorten_url['shorten_url'];
                }
            } else {
                echo "Something went wrong! Please insert again";
            }
        }
    } else {
        echo "$full_url - This is not a valid URL !";
    }
?>