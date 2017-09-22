<?php

    $conn = mysqli_connect("db.webmore.space", "app007", "Kraameep.7777")
    if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
    } 
    echo "Connected successfully";


?>
