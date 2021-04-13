<?php
    /* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with root as password) */
    $link = mysqli_connect("localhost", "root", "root", "digi",'3307');
    
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    else{
        // echo '<script> alert("Connected");</script>';
    }
    

    // $myfile = fopen("district.txt", "r");
    // $did = fgets($myfile);
    // // Escape user inputs for security
     $sec_pin = mysqli_real_escape_string($link, $_REQUEST['sec_pin']);
    // $res_link = mysqli_real_escape_string($link, $_REQUEST['res_link']);
    // $res_type = mysqli_real_escape_string($link, $_REQUEST['res_type']);
  
    

    $sql = "SELECT * FROM `indent` WHERE indent_id= '$sec_pin'";
    $sql1 = mysqli_query($link, $sql);
    if(mysqli_num_rows($sql1) > 0){
        $query= "DELETE FROM `indent` WHERE `indent_id`='$sec_pin'"; 
        $result = mysqli_query($link, $query);
        if($result){
            echo '<script> alert("data removed");</script>';
            echo "<script> location.href='view_indent.php'; </script>";
        }
        else{
            echo '<script> alert("data not removed");</script>';
            echo "<script> location.href='view_indent.php'; </script>";
        }
        mysqli_free_result($result);
    }
    else{
        echo '<script> alert("Incorrect Security pin");</script>';
        echo "<script> location.href='view_indent.php'; </script>";
    }
    
    
    
    // // Close connection
    mysqli_close($link);
?>