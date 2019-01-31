<?php
$CustID = (int) $_GET['CustID'];

if ($CustID == '' or !is_numeric($CustID))
{
  echo("You did not complete the delete form correctly <br>");
  exit();
}

else
{
  $dbcnx = mysqli_connect("localhost", "root", "", "DVDSys");
    
  if (mysqli_connect_errno($dbcnx ))
  {
    echo "Failed to connect to MySQL: ".mysqli_connect_error();
    exit();
  }
  
  $sql = "DELETE from customers WHERE CustID = $CustID";
  $res = mysqli_query($dbcnx, $sql);   

  if($res)
  {
		$count = mysqli_affected_rows($dbcnx);
	}
	
  if($count>0)
  {
    echo("Customer no. " . " ". $CustID. " " . "has been deleted successfully<br>");
    
    echo("<a href='searchUpdate.php'> Click here to return to Customer List</a>");
  }
     
  else
  {
    echo "No such record deleted";
  }

  mysqli_close($dbcnx);	 
}


?>