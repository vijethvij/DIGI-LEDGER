<?php
    /* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with root as password) */
    $link = mysqli_connect("localhost", "root", "root", "digi",'3307');
    
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    else{
        echo '<script> alert("Connected");</script>';
    }
    

    // $myfile = fopen("district.txt", "r");
    // $did = fgets($myfile);
    // // Escape user inputs for security
    $res_name = mysqli_real_escape_string($link, $_REQUEST['res_name']);
    $res_link = mysqli_real_escape_string($link, $_REQUEST['res_link']);
    $res_type = mysqli_real_escape_string($link, $_REQUEST['res_type']);
  
    

 
    $query= "INSERT INTO `resoure` (`res_type`, `res_sub`, `res_link`) VALUES('$res_type', '$res_name', '$res_link');"; 
    $result = mysqli_query($link, $query);
    if($result){
        echo '<script> alert("data saved");</script>';
        echo "<script> location.href='view_resources.php'; </script>";
    }
    else{
        echo '<script> alert("data not saved");</script>';
        echo "<script> location.href='add_resources.html'; </script>";
    }
    mysqli_free_result($result);
    
    
    // // Close connection
    mysqli_close($link);
?>