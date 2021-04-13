<?php
    /* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with root as password) */
    $link = mysqli_connect("localhost", "root", "root", "digi",'3307');
    
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    // // Escape user inputs for security
    $userEmail = mysqli_real_escape_string($link, $_REQUEST['userEmail']);
    $userPassword = mysqli_real_escape_string($link, $_REQUEST['userPassword']);
    
    // // Attempt check id and password
    $sql = "SELECT * FROM login WHERE l_mail='$userEmail' and l_pass='$userPassword'";
    $result = mysqli_query($link, $sql);

    function function_alert() { 
        // Display the alert box  
        echo "<script>alert('Wrong Password');</script>"; 
    } 

    if(mysqli_num_rows($result) > 0){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                if($row['ref']=='district'){
                    $myfile = fopen("DistAdmin/district.txt", "w");
                    $txt = $row['value'];
                    fwrite($myfile, $txt);
                    echo "<script> location.href='DistAdmin/distadmin_landing.html'; </script>";
                    exit;
                }
                else if($row['ref']=='school'){
                    $myfile = fopen("School/school.txt", "w");
                    $txt = $row['value'];
                    fwrite($myfile, $txt);
                    echo "<script> location.href='School/school_landing.html'; </script>";
                    exit;
                }
                else if($row['ref']=='student'){
                    echo "<script> location.href='Student/student_landing.html'; </script>";
                    exit;
                }
                else {
                    echo "<script> location.href='SuperAdmin/admin_landing.html'; </script>";
                    exit;
                }
            }  
        }
    }
    else{
        function_alert();
        echo "<script> location.href='login.html'; </script>";
        exit();
    }
    
    // // Close connection
    mysqli_close($link);
?>