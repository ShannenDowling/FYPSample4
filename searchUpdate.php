<!DOCTYPE html>
<html lang='en'>
  <head>
    <title></title>
    <meta charset='utf-8'>
 
 <style>
 form{width:75%;}
 
 legend{margin-left:auto;
       margin-right:auto;}
 
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

  <form name="custList">
    <fieldset>
      <legend>Customer List</legend>
    <?php
    $dbcnx = mysqli_connect("localhost", "root", "", "dvdsys");
    
    if (mysqli_connect_errno($dbcnx))
    {
      echo "Failed to connect to MySQL: " .mysqli_connect_error();
      exit();
    }


    $sql ="SELECT * FROM customers";
    $res = mysqli_query($dbcnx, $sql);
    
    if (!$res) 
    {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error($dbcnx));
        exit();
    }

    else
	  {
        if(mysqli_num_rows($res)< 1)
        {
          //no customers
          echo "<p><em> No customers</em></p>";  
        }
        
        else
        {
          echo "<table border=1>";
          echo "<tr>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Delete</th>
                <th>Update</th>
                </tr>";

         while($customer_info=mysqli_fetch_array($res))
         {
          
          $custID=$customer_info['CustID'];
          $name=stripslashes($customer_info['CustName']);
          $address=($customer_info['Address']);
          
            echo "<tr><td>$custID</td>";
            echo "<td>$name</td>";
            echo "</td><td>$address</td>";
            echo "<td><a href=\"delete-a-cust.php?CustID=$custID\">Remove</a></td>";
            echo "<td><a href=\"updateForm.php?CustID=$custID\">Update</a></td></tr>"; 
         } 

            echo "</table>";
        }  

    //free results
    mysqli_free_result($res);
  
    //close connection
    mysqli_close($dbcnx);
    }
?>
  </fieldset>
</form>


      <div id="footer">
          <p>Copyright &#169; 2016 Dowlings DVDs. All rights reserved.</p>
      </div>
   </div>
  </body>
</html>