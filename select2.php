<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>Web</title>
    <meta charset='utf-8'>
 <style type="text/css">
 table{background-color:#B3CCE6;
            border:3px solid #FFFFFF;
            width:60%;
            margin: auto auto;}
          
    form{width:50%;}
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
        
              <?php

                $dbcnx = mysqli_connect("localhost", "root", "", "dvdsys");
  
                if (mysqli_connect_errno($dbcnx ))
                {
                  echo "Failed to connect to MySQL: " .mysqli_connect_error();
                  exit();
                }

                else
                {
                  $custID = (int)$_POST['id'];
                  $sql = "SELECT * from customers where CustID = $custID";
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
                      //there are no customer
                      echo "<p><em> No customers</em></p>";
                      exit();
                    }
   
                    else 
                    {
                      echo("<table border='1'>");
                      echo("<tr><th>Cust ID</th>");
                      echo("<th>Name</th>");
                      echo("<th>Address</th>");        
        
                      while ( $row = mysqli_fetch_array($res) )
                      {
                        echo("<tr><td>". $row['CustID']. "</td><td>" .stripslashes($row['CustName']). "</td><td>". $row['Address']. "</td></tr>");
                      }
                      
                      echo("</tr></table>");
                    }
                  } 
  
    
                  //free results
                  mysqli_free_result($res);
                  mysqli_close($dbcnx);
                }
              ?>
            
              <div id="footer">
                <p>Copyright &#169; 2016 Dowlings DVDs. All rights reserved.</p>
              </div>
        
      </div>
  </body>
</html>