<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Resources | DIGI-LEDGER </title>
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
        $myfile = fopen("school.txt", "r");
        $value = fgets($myfile);
        
        echo "
        <div class='container mt-4'>
          <div class='row'>
            <h1 class='col-10'>Indents</h1> 
            <a href='add_indent.html' class='col-2 mb-4 btn btn-primary'>
            Add Indents
            </a> 
          </div>
        </div>";
      



        // $sql = "SELECT * FROM digi.admin";
        $sql = "SELECT i.indent_id, i.indent_subject, i.indent_link, i.indent_status,i.indent_timestamp, s.s_name FROM `indent` as i , school as s WHERE i.school_id=s.s_id AND i.school_id='$value'";
        if($result = mysqli_query($link, $sql)){  
          
          // echo "</div>";
            if(mysqli_num_rows($result) > 0){
              echo "<div class='container'>";
                // echo "<div class='card shadow bg-white rounded'>";
                //   echo "<div class='row mt-4'>";
                    while($row = mysqli_fetch_array($result)){
                      // echo "<div class='row mt-4'>";
                        echo "<div class='card shadow bg-white rounded mb-4 mt-4'>";
                          echo "<div class='card-body'>";
                            echo "<div class='row ml-1'>";
                              echo "<div class='col-6'>";
                                echo "<h5 class='card-title'>". $row['indent_subject'] ."</h5>";
                              echo "</div>";
                              echo "<div class='col-3'>";
                                echo date('m/d/Y',strtotime($row['indent_timestamp']));
                              echo "</div>";
                              echo "<div class='col-3'>";
                                echo "<h6 class='card-subtitle mb-2 mt-1 text-muted'>". $row['indent_status'] ."</h6>";
                              echo "</div>";
                            echo "</div>";
                            echo "<div class='row'>";
                              echo "<div class='col-6 '>";
                                echo "<p class='card-text'><a target='_blank' href='".$row['indent_link']."'>".  $row['indent_link'] . "</a></p>";
                              echo "</div>";
                              echo "<div class='col-3'>";
                                echo "<p class='card-text font-weight-bold'>".  $row['s_name'] . "</p>";
                              echo "</div>";
                              echo "<div class='col-2'>";
                                echo "<h6 class='card-subtitle mb-2 mt-2 text-muted'>Security pin : ". $row['indent_id'] ."</h6>";

                              echo "</div>";
                              echo "<div class='col-1'>";
                                echo "<a href='rem_ind.html'><img src='https://img.icons8.com/material-sharp/24/000000/delete-forever.png'/></a>";
                              echo "</div>";
                            echo "</div>";
                          echo "</div>";
                        echo "</div>";
                      // echo "</div>";
                    }
                //   echo "</div>";
                // echo "</div>";
              echo "</div>";
              mysqli_free_result($result);
            } else{
                echo "No records matching your query were found.";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }                  
        mysqli_close($link); 
        
        function addAdmin(){

        }
                   
                          
                           
                            
                      //     echo "</div>";
                      //   echo "</div>";
                      // echo "</div>";
                      // echo "<div class='col-3'>";
                      //   echo date('m/d/Y',strtotime($row['indent_timestamp']));
                      //   echo "<br>";
                      //   echo date('h:i:s a',strtotime($row['indent_timestamp']));
                      // echo "</div>";
                 //   }
              //   echo "</div>";
              // echo "</div>";
                // Free result set
        //         mysqli_free_result($result);
        //     } else{
        //         echo "No records matching your query were found.";
        //     }
        // } else{
        //     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        // }
        // Close connection
        // mysqli_close($link);

      //   function addAdmin(){

      //   }
       ?>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>