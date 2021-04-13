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
    <div class='container mt-4'>
        <div class='row m-4'>
          <h1 class='col-10'>Schools</h1>
          <a href="add_school.html" type='button' class='col-2 btn btn-primary mb-4'>
              Add School
          </a>
          <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Launch demo modal
          </button> -->
        </div>
    </div>

    


    <!-- <div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLongTitle'>Add Admin</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <form action="add_school.php" method="POST">
					<div class='modal-body'>
						<div class='form-group'>
							<label for='message-text' class='col-form-label'> School Name</label>
							<input type='text' class='form-control' name='school_name'>
						</div>
						<div class='form-group'>
							<label for='message-text' class='col-form-label'> Head Master Name</label>
							<input type='text' class='form-control' name='hm_name'>
						</div>
						<div class='form-group'>
							<label for='message-text' class='col-form-label'>Email ID</label>
							<input type='email' class='form-control' name='email_id'>
						</div>
						<div class='form-group'>
							<label for='message-text' class='col-form-label'>Office Address</label>
							<textarea class='form-control' rows='3' name='address'></textarea>
						</div>
						<div>
							<label>Medium : </label>
							<label class="radio-inline"><input type="radio" name="radio" checked> Kannada</label>
							<label class="radio-inline"><input type="radio" name="radio"> English</label>
						</div>
						<div>
							<label>Type : </label>
							<label class="radio-inline"><input type="radio" name="radio1" checked> Government</label>
							<label class="radio-inline"><input type="radio" name="radio1">Private</label>
							<label class="radio-inline"><input type="radio" name="radio1">Aided</label>
						</div>
					</div> 
					<div class='modal-footer'>
						<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
						<button type='button' class='btn btn-primary' name='insertdata' type='submit'>Add School</button>
					</div> 
				</form>
            </div>
        </div>
    </div> -->


        <!-- <h1 class="m-4">Schools</h1> -->
      <?php
        /* Attempt MySQL server connection. Assuming you are running MySQL
        server with default setting (user 'root' with root as password) */
        $link = mysqli_connect("localhost", "root", "root", "digi",'3307');
        
        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        
        // Attempt select query execution
        $myfile = fopen("district.txt", "r");
        $value = fgets($myfile);
        $sql = "SELECT * FROM digi.school WHERE d_id='$value'";
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
                            echo "<td>" . $row['d_id'] . "</td>";
                        
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
		
		if(isset($_POST['submit'])){
			if(!empty($_POST['school_name'])) {
				$school_name = $_POST['school_name'];
				// echo '  ' . $_POST['school_name'];
				$myfile1 = fopen("temp.txt", "w");
				fwrite($myfile1, $school_name);
			} else {
				echo 'Please select the value.';
			}
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