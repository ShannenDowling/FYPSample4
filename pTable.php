<!DOCTYPE html>
<html lang='en'>
  <head>
    <title></title>
    <meta charset='utf-8'>
 
 <style type="text/css">
 
 table{background-color:#FFFFFF;
       border:3px solid #B3CCE6;
       margin-left:auto;
       margin-right:auto;
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
        
        
        <div id="footer">
                <p>Copyright &#169; 2016 Dowlings DVDs. All rights reserved.</p>
        </div>
        
    </div>
    <?php
              $dbcnx = mysqli_connect("localhost", "root", "", "dvdsys");
              
              if (mysqli_connect_errno($dbcnx))
              {
                echo "Failed to connect to MySQL: " .mysqli_connect_error();
                exit();
              }
              
              else 
              {
                $sql = "SELECT * from purchases";
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
                    echo "<p><em> No Purchases</em></p>";
                    exit();
                  }
   
                  else
                  {
                    echo("<table border='1'>");
                    echo("<tr><th>Purchase No</th>");
                    echo("<th>Purchase Date</th>");
                    echo("<th>Price</th>");
                    echo("<th>Quantity</th>");
                    echo("<th>DVD No</th>");
                    echo("<th>Cust ID</th>");
                     
                    while ($row = mysqli_fetch_array($res)) 
                    {
                      echo("<tr><td>". $row['PurchaseNo']. "</td><td>". stripslashes($row['PurchaseDate']). "</td><td>€". $row['Price']. "</td><td>". $row['Qty']. "</td><td>". $row['DVDNo']. "</td><td>". $row['CustID']. "</td></tr>");
                    }
                    
                    echo("</tr></table>");
                    
                  }               
                } 

                //free results
                mysqli_free_result($res);
                mysqli_close($dbcnx);
              }
    //when SUBMIT pressed check text boxes (DVD Name & Quantity) & (Customer Name & Address)
    //if Qty less than Quantity in stock -> minus and update DVDs table
    //open purchases table page
    //Calc Price -> price from DVDs table * Qty
    //add all details to Purchases table
            //purchase no
            //purchase date
            //price
            //qty
            //dvdno
            //custid
    
    ?>
    
    
  
  </body>
</html>