<!DOCTYPE html>
<html lang='en'>
  <head>
    <title></title>
    <meta charset='utf-8'>

    <style type="text/css">
    
      table{background-color:#B3CCE6;
            border:3px solid #FFFFFF;
            width:50%;}
    
    </style>
    
    <link rel="stylesheet" type="text/css" href="dvds.css"> 

  </head>
  <body>

  <div id="page">
        
        <div id="menu">
        
        <a href="index.php">Home</a>
        <a href="newCustomer.html">Register</a>
        <a href="searchUpdate.php">Customers</a>
        <a href="purchases.php">Purchases</a>
        <a href="#">About</a>
        <a href="#">Contact Us</a>
        
        </div>
        
        <div id="box">
          <p>Dowlings DVDs</p>
        </div>

        <div id="left2">
          <img src="images/HarryPotter.jpg" width="100" height="150" alt="Harry Potter">
          <p><a href="purchases.php">Harry Potter</a></p>
        
          <img src="images/MeanGirls.jpg" width="100" height="150" alt="Mean Girls">
          <p><a href="purchases.php">Mean Girls</a></p>
        </div>
      
        <div id="left">
          <img src="images/SuicideSquad.jpg" width="100" height="150" alt="Suicide Squad">
          <p><a href="purchases.php">Suicide Squad</a></p>
        
          <img src="images/Frozen.jpg" width="100" height="150" alt="Frozen">
          <p><a href="purchases.php">Frozen</a></p>
        </div>  
        
        <div id="right">
          <img src="images/FindingNemo.jpg" width="100" height="150" alt="FindingNemo">
          <p><a href="purchases.php">FindingNemo</a></p>
        
          <img src="images/Avatar.jpg" width="100" height="150" alt="Avatar">
          <p><a href="purchases.php">Avatar</a></p>
        </div>
        
        <div id="right2">
        
          <h4>DVD Charts</h4>
            <?php
              $dbcnx = mysqli_connect("localhost", "root", "", "dvdsys");
              
              if (mysqli_connect_errno($dbcnx ))
              {
                echo "Failed to connect to MySQL: " .mysqli_connect_error();
                exit();
              }
              
              else 
              {
                $sql = "SELECT * from dvds";
                $res = mysqli_query($dbcnx, $sql);
                
                if (!$res) 
                {
                  echo('Query failed ' . $sql . ' Error:' . mysqli_error());
                  exit();
                }

                else
                {
                  if(mysqli_num_rows($res)< 1)
                  {
                    //there are no dvds
                    echo "<p><em> No DVDs</em></p>";
                    exit();
                  }
   
                  else
                  {
                    echo("<table border='1'>");
                    echo("<tr><th>DVD No</th>");
                    echo("<th>Name</th>");
                     
                    while ( $row = mysqli_fetch_array($res)) 
                    {
                      echo("<tr><td>". $row['DVDNo']. "</td><td>" .stripslashes($row['Name']). "</td></tr>");
                    }
                    
                    echo("</tr></table>");
                    
                  }               
                } 

                //free results
                mysqli_free_result($res);
                mysqli_close($dbcnx);
              }
            ?>

          </div>
          
            <div id="footer">
                <p>Copyright &#169; 2016 Dowlings DVDs. All rights reserved.</p>
            </div>
        
      </div>

  </body>
</html>