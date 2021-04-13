<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>


    <nav class="navbar navbar-expand-md navbar-light" style="background-color: rgb(104, 104, 124);">
      <!-- Brand -->
      <a class="navbar-brand" href="#" style="color: aliceblue;">DIGI-LEDGER</a>
    
      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav nav navbar-right" >
          <li class="nav-item"  >
            <a class="nav-link" href="#"  style="color: aliceblue;">MY ACCOUNT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"  style="color: aliceblue;">LOG OUT</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li> -->
        </ul>
      </div>
    </nav>

    <div class="container">
      <?php
        /* Attempt MySQL server connection. Assuming you are running MySQL
        server with default setting (user 'root' with root as password) */
        $link = mysqli_connect("localhost", "root", "root", "digi",'3307');
        
        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        
        // Attempt select query execution
        $myfile = fopen("school.txt", "r");
        $value = fgets($myfile);
        // $sql = "SELECT s.stu_id, s.stu_fname, s.stu_lname, s.stu_dob, s.stu_age, s.Sex, s.stu_std, s.stu_father, s.stu_mother, sc.s_name FROM student AS s, school AS sc WHERE s.s_id=sc.s_id AND s.s_id in ( SELECT s_id FROM school WHERE school.d_id='$value')";
        $sql = "SELECT s.stu_id, s.stu_fname, s.stu_lname, s.stu_dob, s.stu_age, s.Sex, s.stu_std, s.stu_father, s.stu_mother, sc.s_name FROM student AS s, school AS sc WHERE s.s_id=sc.s_id AND s.s_id in ( SELECT s_id FROM student WHERE student.s_id='$value')";
        // $sql = "SELECT * FROM `student` WHERE s_id in ( SELECT s_id FROM school WHERE school.d_id='$value')";
        $sql1= "SELECT stu_id FROM digi.student";
        $stunum = mysqli_query($link, $sql1);
        $data=mysqli_num_rows($stunum);
        // $stunum = mysqli_query($link. $sql1);
        echo "<br>";
        echo "<h1>Students</h1>";
        echo "<h5>Number of students : ".$data."</h5>";
        echo "<br>";
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                echo "<table class='table table-hover'>";
                  echo "<thead>";
                    echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>Name</th>";
                        echo "<th>DOB</th>";
                        echo "<th>Age</th>";
                        echo "<th>Class</th>";
                        echo "<th>Father</th>";
                        echo "<th>Mother</th>";
                        echo "<th>School Name</th>";
                    echo "</tr>";
                  echo "</thead>";
                  echo "<tbody>";
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                            echo "<td>" . $row['stu_id'] . "</td>";
                            echo "<td>" . $row['stu_fname'] ." " . $row['stu_lname'] . "</td>";
                            echo "<td>" . $row['stu_dob'] . "</td>";
                            echo "<td>" . $row['stu_age'] . "</td>";
                            echo "<td>" . $row['stu_std'] . "</td>";
                            echo "<td>" . $row['stu_father'] . "</td>";
                            echo "<td>" . $row['stu_mother'] . "</td>";
                            echo "<td>" . $row['s_name'] . "</td>";
                        echo "</tr>";
                    }
                  echo "</tbody>";
                echo "</table>";
                // Free result set
                mysqli_free_result($result);
              
            } else{
                echo "No records matching your query were found.";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        
        // Close connection
        mysqli_close($link);
      ?>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>