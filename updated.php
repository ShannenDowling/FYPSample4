<?php

// Connect to the database server
$dbcnx = mysqli_connect("localhost", "root", "", "dvdsys");

  if (mysqli_connect_errno($dbcnx ))
  {
    echo "Failed to connect to MySQL: " .mysqli_connect_error();
    exit();
  }

  $ud_id=$_POST['ud_id'];
  $ud_name=$_POST['ud_name'];
  $ud_address=$_POST['ud_address'];

  $sql="UPDATE customers SET CustName ='$ud_name', Address ='$ud_address' WHERE CustID=$ud_id";
  $res = mysqli_query($dbcnx, $sql);
  
  if ( !$res ) 
  {
    echo('Query failed ' . $sql . ' Error:' . mysqli_error());
    exit();
  }

  else
	{
    echo $res;
    
    if(mysqli_affected_rows($dbcnx)< 1)
    {
      echo "<p><em> No updates</em></p>"; 
    }
  
    else
    {
      echo " Record Updated";
      echo("<a href='searchUpdate.php'> <br>Click here to return to Customer List </a>");
    }
      
  mysqli_close($dbcnx);
  }

?>