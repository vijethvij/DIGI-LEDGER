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
      <a class="navbar-brand" href="admin_landing.html" style="color: aliceblue;">DIGI-LEDGER</a>
    
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
            <a class="nav-link" href="../login.html"  style="color: aliceblue;">LOG OUT</a>
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
        echo "<h1 class='m-4'>Schools</h1>";
        // Attempt select query execution
        $sql = "SELECT s.s_id, s.s_name, s.s_hm_name, s.s_email, s.s_num_stud, s.s_adrs, s.s_medium, s.s_type, d.d_name FROM `school` as s, district as d WHERE s.d_id=d.d_id";
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                echo "<table class='table table-hover'>";
                  echo "<thead>";
                    echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>Name</th>";
                        echo "<th>HM Name</th>";
                        echo "<th>Email</th>";
                        echo "<th>Students</th>";
                        // echo "<th>Staff</th>";
                        echo "<th>Address</th>";
                        echo "<th>Medium</th>";
                        echo "<th>Type</th>";
                        echo "<th>District</th>";
                    echo "</tr>";
                  echo "</thead>";
                  echo "<tbody>";
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                            echo "<td>" . $row['s_id'] . "</td>";
                            echo "<td>" . $row['s_name'] . "</td>";
                            echo "<td>" . $row['s_hm_name'] . "</td>";
                            echo "<td>" . $row['s_email'] . "</td>";
                            echo "<td>" . $row['s_num_stud'] . "</td>";
                            // echo "<td>" . $row['s_staff'] . "</td>";
                            echo "<td>" . $row['s_adrs'] . "</td>";
                            echo "<td>" . $row['s_medium'] . "</td>";
                            echo "<td>" . $row['s_type'] . "</td>";
                            echo "<td>" . $row['d_name'] . "</td>";
                        
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