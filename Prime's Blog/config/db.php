<?php
    // Create connection 

    $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME );

    // check connection
    if(mysqli_connect_errno()){
        // CONNECTION FAILED
        echo 'CONECTION IS FAILED'. mysqli_connect_errno();
    }
?>