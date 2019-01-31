<!DOCTYPE html>
<html lang='en'>
  <head>
    <title></title>
    <meta charset='utf-8'>
    <meta name='description' content=''>

    <style type="text/css">
    table{position:absolute;
          top:25%;
          left:60%;
          padding:2em;
          width:60%;
          background-color:#FFFFFF;
          border:3px solid #B3CCE6;
          margin-left:auto;
          margin-right:auto;
          width:30%;}
          
    form{width:50%;}
    
    fieldset{width:30%;}
                
    #r{position:absolute;
       top:5%;
       left:48%;
       width:18%;}
    
    #purchLink{position:absolute;
       top:58%;
       left:72%;}
          
    #sub{position:absolute;
         top:90%;
         left:72%;}
    </style>
    
    <link rel="stylesheet" type="text/css" href="dvds.css">
  
  </head>
  <body>
  
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
          
          <form action="addPurchase.php" method="post" id="left2">
           
            <fieldset>
              <legend>DVD Details</legend>
     
          <?php         
            // Connect to the database server
            $dbcnx = mysqli_connect("localhost", "root", "", "dvdsys");
            if (mysqli_connect_errno($dbcnx))
            {
              echo "Failed to connect to MySQL: " .mysqli_connect_error();
              exit();
            }


            $sql = "SELECT * FROM dvds";

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
              echo "<p><em> No DVDs</em></p>"; 
            }
  
            else
            {
              echo("Please the DVD number: "); 
              echo("<select name='dvdNo'>");  


              while($row=mysqli_fetch_array($res))
              {
                  $bt = $row['DVDNo'];

        ?>

      <option value="<?php echo $bt; ?>">     
      
      <?php echo $row["DVDNo"]; ?>
   
      </option><br> 
      <?php }
   
        echo("</select>");
           }  
        }
        ?>
        
            <?php         
            // Connect to the database server
            $dbcnx = mysqli_connect("localhost", "root", "", "dvdsys");
            if (mysqli_connect_errno($dbcnx))
            {
              echo "Failed to connect to MySQL: " .mysqli_connect_error();
              exit();
            }


            $sql1 = "SELECT * FROM dvds";

            $res1 = mysqli_query($dbcnx, $sql1);
            if ( !$res1 )
            {
              echo('Query failed ' . $sql1 . ' Error:' . mysqli_error());
              exit();
            }
 
  
          else
	        {
  
            if(mysqli_num_rows($res1)< 1)
            {
              echo "<p><em> No DVDs</em></p>"; 
            }
  
            else
            {
              echo("<br><br>Please select a DVD: "); 
              echo("<select name='dvdName'>");  


              while($row=mysqli_fetch_array($res1))
              {
                  $bt = $row['Name'];

        ?>

      <option value="<?php echo $bt; ?>">     
      
      <?php echo $row["Name"]; ?>
   
      </option> 
      <?php }
   
        echo("</select>");
           }  
        }
        ?>
      
       <?php         
            // Connect to the database server
            $dbcnx = mysqli_connect("localhost", "root", "", "dvdsys");
            if (mysqli_connect_errno($dbcnx))
            {
              echo "Failed to connect to MySQL: " .mysqli_connect_error();
              exit();
            }


            $sql5 = "SELECT * FROM dvds";

            $res5 = mysqli_query($dbcnx, $sql5);
            if ( !$res5 )
            {
              echo('Query failed ' . $sql5 . ' Error:' . mysqli_error());
              exit();
            }
 
  
          else
	        {
  
            if(mysqli_num_rows($res5)< 1)
            {
              echo "<p><em> No DVDs</em></p>"; 
            }
  
            else
            {
              echo("<br><br>Please select the Price: "); 
              echo("<select name='dvdPrice'>");  


              while($row=mysqli_fetch_array($res5))
              {
                  $bt = $row['DVDPrice'];

        ?>

      <option value="<?php echo $bt; ?>">     
      
      <?php echo $row["DVDPrice"]; ?>
   
      </option> 
      <?php }
   
        echo("</select>");
           }  
        }
        ?>
                <br><br>
                <label>Quantity: </label><br><input type="text" name="qty"><br>
              </fieldset>
              
              <fieldset id="r">
                <legend>Customer Details</legend>
            
            <?php         
            // Connect to the database server
            $dbcnx = mysqli_connect("localhost", "root", "", "dvdsys");
            if (mysqli_connect_errno($dbcnx))
            {
              echo "Failed to connect to MySQL: " .mysqli_connect_error();
              exit();
            }


            $sql2 = "SELECT * FROM customers";

            $res2 = mysqli_query($dbcnx, $sql2);
            if ( !$res2 )
            {
              echo('Query failed ' . $sql2 . ' Error:' . mysqli_error());
              exit();
            }
 
  
          else
	        {
  
            if(mysqli_num_rows($res2)< 1)
            {
              echo "<p><em> No Customers</em></p>"; 
            }
  
            else
            {
              echo("Please select your ID: "); 
              echo("<select name='custID'>");  


              while($row=mysqli_fetch_array($res2))
              {
                  $bt = $row['CustID'];

        ?>

      <option value="<?php echo $bt; ?>">     
      
      <?php echo $row["CustID"]; ?>
   
      </option> 
      <?php }
   
        echo("</select>");
           }  
        }
             ?>
             
             <?php    
            // Connect to the database server
            $dbcnx = mysqli_connect("localhost", "root", "", "dvdsys");
            if (mysqli_connect_errno($dbcnx))
            {
              echo "Failed to connect to MySQL: " .mysqli_connect_error();
              exit();
            }


            $sql3 = "SELECT * FROM customers";

            $res3 = mysqli_query($dbcnx, $sql3);
            if ( !$res3 )
            {
              echo('Query failed ' . $sql3 . ' Error:' . mysqli_error());
              exit();
            }
 
  
          else
	        {
  
            if(mysqli_num_rows($res3)< 1)
            {
              echo "<p><em> No Customers</em></p>"; 
            }
  
            else
            {
              echo("<br><br>Please select your name: "); 
              echo("<select name='custName'>");  


              while($row=mysqli_fetch_array($res3))
              {
                  $bt = $row['CustName'];

        ?>

      <option value="<?php echo $bt; ?>">     
      
      <?php echo $row["CustName"]; ?>
   
      </option> 
      <?php }
   
        echo("</select>");
           }  
        }
        ?>
              <br><br>
                <label>Date: </label><br><input type="text" name="purchDate"><br>
              </fieldset>
    
            <input id="sub" type="submit" name="submitdetails" value="SUBMIT">
            
            </form>
          
        
       
           
            
          <div>
            <?php
            $dbcnx = mysqli_connect("localhost", "root", "", "dvdsys");
              
              if (mysqli_connect_errno($dbcnx))
              {
                echo "Failed to connect to MySQL: " .mysqli_connect_error();
                exit();
              }
                  
            else 
              {
                $sql4 = "SELECT * from dvds";
                $res4 = mysqli_query($dbcnx, $sql4);
                
                if (!$res4) 
                {
                  echo('Query failed ' . $sql4 . ' Error:' . mysqli_error());
                  exit();
                }

                else
                {
                  if(mysqli_num_rows($res4)< 1)
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
                    echo("<th>Quantity in Stock</th>");
                    echo("<th>Price</th>");
                     
                    while ($row = mysqli_fetch_array($res4)) 
                    {
                      echo("<tr><td>". $row['DVDNo']. "</td><td>". stripslashes($row['Name']). "</td><td>". $row['QtyInStock']. "</td><td>€". $row['DVDPrice']. "</td></tr>");
                    }
                    
                    echo("</tr></table>");
                    
                  }               
                } 

                //free results
                mysqli_free_result($res4);
                mysqli_close($dbcnx);
              }
              

            ?>
            <h4 class="centered" id="purchLink"><a href="pTable.php">View Purchases</a></h4>
        </div>
     
    <div id="footer">
          <p>Copyright &#169; 2016 Dowlings DVDs. All rights reserved.</p>
      </div>
        
      

  </body>
</html>