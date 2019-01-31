<!DOCTYPE html>
<html lang='en'>
  <head>
    <title></title>
    <meta charset='utf-8'>

  </head>
  <body>

  <?php
  // Connect to the database server
  $dbcnx = mysqli_connect("localhost", "root", "", "dvdsys");

  if (mysqli_connect_errno($dbcnx))
  {
    echo "Failed to connect to MySQL: " .mysqli_connect_error();
    exit();
  }

  $id=(int)$_GET['CustID'];
  $sql="SELECT * FROM customers WHERE CustID=$id";
  $res = mysqli_query($dbcnx, $sql);
  
  if (!$res)
  {
    echo('Query failed ' . $sql . ' Error:' . mysqli_error($dbcnx));
    exit();
  }

  else 
  {
    $row = mysqli_fetch_array($res); 
    $name=$row['CustName'];
    $address=$row['Address'];
  }
  
  //free results
  mysqli_free_result($res);
  
  //close connection
  mysqli_close($dbcnx);
?>

<form action="updated.php" method="post">
<input type="hidden" name="ud_id" value="<?php echo $id; ?>">
Name: <input type="text" name="ud_name" value="<?php echo $name; ?>"><br />
Address: <input type="text" name="ud_address" value="<?php echo $address; ?>"><br />


<input type="Submit" value="Update">
</form>

  </body>
</html>