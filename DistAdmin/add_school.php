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
    

    // if(isset($_POST['insertdata'])){
    //     $school_name=$_POST['school_name'];
    //     $hm_name = $_POST['hm_name'];
    //     $email_id = $_POST['email_id'];
    //     $address = $_POST['address'];
        
    //     $query= "INSERT INTO school (s_name, s_hm_name, s_email, s_num_stud, s_adrs, d_id) VALUES ('$school_name', '$hm_name', '$email_id', '$address', 'BAGA')"; 
    //     $result = mysqli_query($link, $query);

    //     if($result){
    //         echo '<script> alert("data saved");</script>';
    //     }
    //     else{
    //         echo '<script> alert("data not saved");</script>';
    //     }
    // }
    // else{
    //     echo '<script> alert("data dint come in saved");</script>';
    // }
    $myfile = fopen("district.txt", "r");
    $did = fgets($myfile);
    // // Escape user inputs for security
    $school_name = mysqli_real_escape_string($link, $_REQUEST['school_name']);
    $hm_name = mysqli_real_escape_string($link, $_REQUEST['hm_name']);
    $email_id = mysqli_real_escape_string($link, $_REQUEST['email_id']);
    $address = mysqli_real_escape_string($link, $_REQUEST['address']);
    // $medium = mysqli_real_escape_string($link, $_REQUEST['radio']);
    // $type = mysqli_real_escape_string($link, $_REQUEST['radio1']);

    $num_stud=15;
    $query= "INSERT INTO `school` (`s_name`, `s_hm_name`, `s_email`, `s_num_stud`, `s_adrs`, `d_id`) VALUES ('$school_name', '$hm_name', '$email_id', '$num_stud','$address', '$did')"; 
    $result = mysqli_query($link, $query);
    if($result){
        echo '<script> alert("data saved");</script>';
        echo "<script> location.href='view_schools.php'; </script>";
    }
    else{
        echo '<script> alert("data not saved");</script>';
        echo "<script> location.href='add_school.html'; </script>";
    }
    mysqli_free_result($result);
    // $myfile1 = fopen("temp.txt", "w");
    // $txt = $school_name . $hm_name . $email_id . $address . $medium . $type;
    // fwrite($myfile1, $school_name);
    
    // // // Attempt check id and password
    // $sql = "SELECT * FROM login WHERE l_mail='$userEmail' and l_pass='$userPassword'";
    // $result = mysqli_query($link, $sql);

    // function function_alert() { 
    //     // Display the alert box  
    //     echo "<script>alert('Wrong Password');</script>"; 
    // } 

    // if(mysqli_num_rows($result) > 0){
    //     if(mysqli_num_rows($result) > 0){
    //         while($row = mysqli_fetch_array($result)){
    //             if($row['ref']=='district'){
    //                 $myfile = fopen("DistAdmin/district.txt", "w");
    //                 $txt = $row['value'];
    //                 fwrite($myfile, $txt);
    //                 echo "<script> location.href='DistAdmin/distadmin_landing.html'; </script>";
    //                 exit;
    //             }
    //             else if($row['ref']=='school'){
    //                 $myfile = fopen("School/school.txt", "w");
    //                 $txt = $row['value'];
    //                 fwrite($myfile, $txt);
    //                 echo "<script> location.href='School/school_landing.html'; </script>";
    //                 exit;
    //             }
    //             else if($row['ref']=='student'){
    //                 echo "<script> location.href='Student/student_landing.html'; </script>";
    //                 exit;
    //             }
    //             else {
    //                 echo "<script> location.href='SuperAdmin/admin_landing.html'; </script>";
    //                 exit;
    //             }
    //         }  
    //     }
    // }
    // else{
    //     function_alert();
    //     echo "<script> location.href='login.html'; </script>";
    //     exit();
    // }
    
    // // Close connection
    mysqli_close($link);
?>