<?php
    /* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with root as password) */
    $link = mysqli_connect("localhost", "root", "root", "digi",'3307');
    
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
 
    echo "You are welcome!";
    // // Close connection
    mysqli_close($link);
?>