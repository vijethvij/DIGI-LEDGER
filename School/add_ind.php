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
    

    $myfile = fopen("school.txt", "r");
    $sid = fgets($myfile);
    // // Escape user inputs for security
    $ind_name = mysqli_real_escape_string($link, $_REQUEST['ind_name']);
    $ind_link = mysqli_real_escape_string($link, $_REQUEST['ind_link']);
    //$res_type = mysqli_real_escape_string($link, $_REQUEST['res_type']);
  
    

 
    $query= "INSERT INTO `indent` (`indent_subject`, `indent_link`, `school_id`) VALUES('$ind_name', '$ind_link' , '$sid');"; 
    $result = mysqli_query($link, $query);
    if($result){
        echo '<script> alert("data saved");</script>';
        echo "<script> location.href='view_indent.php'; </script>";
    }
    else{
        echo '<script> alert("data not saved");</script>';
        echo "<script> location.href='add_indent.html'; </script>";
    }
    mysqli_free_result($result);
    
    
    // // Close connection
    mysqli_close($link);
?>