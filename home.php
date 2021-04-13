<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">

       
    </head>
    <body>
        <?php
            $con=new mysqli("localhost","root","root","exper",'3307');
 
            // Check connection
            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }

            $sql = "SELECT s_id FROM exper.student;";
            $result= $con->query($sql);
            if($result->num_rows>0){
                echo "<table>
                        <tr>
                            <th>ID</th>
                        </tr>";
                while($row=$result->fetch_assoc()){
                    echo "<tr><td>".$row["s_id"]."</td></tr>";
                }
                echo "</table>";
            }
            else{
                echo "0 results";
            }
            $con->close();  
        ?>
        
        <div>
            Hello!!!
        </div>
    </body>
</html>