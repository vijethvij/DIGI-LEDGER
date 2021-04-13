<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Admins | DIGI-LEDGER </title>
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
        
        // Attempt select query execution
        // echo "<button type='button' class='btn btn-primary'>Add Admins</button>";

        
        echo "
        <div class='container mt-4'>
          <div class='row'>
            <h1 class='col-10'>Admins</h1>
            <button type='button' class='col-2 btn btn-primary' data-toggle='modal' data-target='#exampleModalCenter'>
              Add Admin
            </button>
          </div>
        </div>
    
        <div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
          <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLongTitle'>Add Admin</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>
              <div class='modal-body'>
                <form>
                  <div class='form-group'>
                      <label for='message-text' class='col-form-label'>Name</label>
                      <input type='text' class='form-control'>
                  </div>
                  <div class='form-group'>
                      <label for='message-text' class='col-form-label'>Phone Number</label>
                      <input type='text' class='form-control'>
                  </div>
                  <div class='form-group'>
                      <label for='message-text' class='col-form-label'>Email ID</label>
                      <input type='email' class='form-control'>
                  </div>
                  <div class='form-group'>
                      <label for='message-text' class='col-form-label'>Office Address</label>
                      <textarea class='form-control' rows='3'></textarea>
                  </div>
                </form>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                <button type='button' class='btn btn-primary' >Add Admin</button>
              </div>
            </div>
          </div>
        </div>";



        // $sql = "SELECT * FROM digi.admin";
        $sql = "SELECT a.a_fname, a.a_lname, d.d_name, a.a_pno, a.a_email, a.a_adrs FROM admin AS a, district AS d WHERE a.a_id=d.a_id";
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
              echo "<div class='container'>";
                echo "<div class='row mt-4'>";
                    while($row = mysqli_fetch_array($result)){
                      echo "<div class='col-3 ml-4 mr-4 mt-2 mb-2'>";
                        echo "<div class='card shadow p-3 mb-5 bg-white rounded' style='width: 18rem;'>";
                          echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>". $row['d_name'] ."</h5>";
                            echo "<h6 class='card-subtitle mb-2 text-muted'>". $row['a_fname'] . " " .$row['a_lname'] ."</h6>";
                            echo "<p class='card-text'>".  $row['a_adrs'] . "</p>";
                            echo "<a href='mailto:" . $row['a_email'] . "class='card-link'>" . $row['a_email'] . "</a><br>";
                            echo "<a href='#' class='card-link'>". $row['a_pno']."</a>";
                          echo "</div>";
                        echo "</div>";
                      echo "</div>";
                    }
                echo "</div>";
              echo "</div>";
                // Free result set
                mysqli_free_result($result);
            } else{
                echo "No records matching your query were found.";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

        // echo "<br>";

        // $sql = "SELECT a.a_fname, a.a_lname, d.d_name, a.a_pno, a.a_email, a.a_adrs FROM admin AS a, district AS d WHERE a.a_id=d.a_id";
        // if($result = mysqli_query($link, $sql)){
        //     if(mysqli_num_rows($result) > 0){
        //         echo "<table class='table table-hover m-4'>";
        //           echo "<thead>";
        //             echo "<tr>";
        //                 // echo "<th>Admin ID</th>";
        //                 echo "<th>Name</th>";
        //                 echo "<th>District</th>";
        //                 echo "<th>Phone Number</th>";
        //                 echo "<th>Email</th>";
        //                 echo "<th>Address</th>";
        //             echo "</tr>";
        //           echo "</thead>";
        //           echo "<tbody>";
        //             while($row = mysqli_fetch_array($result)){
        //                 echo "<tr>";
        //                     // echo "<td>" . $row['a_id'] . "</td>";
        //                     echo "<td>" . $row['a_fname'] . " " .$row['a_lname'] . "</td>";
        //                     echo "<td>" . $row['d_name'] . "</td>";
        //                     echo "<td>" . $row['a_pno'] . "</td>";
        //                     echo "<td><a href='mailto:" . $row['a_email']."'>" . $row['a_email'] . "</a></td>";
        //                     echo "<td>" . $row['a_adrs'] . "</td>";
        //                 echo "</tr>";
        //             }
        //           echo "</tbody>";
        //         echo "</table>";
        //         // Free result set
        //         mysqli_free_result($result);
        //     } else{
        //         echo "No records matching your query were found.";
        //     }
        // } else{
        //     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        // }
      



        // Close connection
        mysqli_close($link);

        function addAdmin(){

        }
      ?>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>