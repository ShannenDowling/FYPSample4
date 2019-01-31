<?php

$custName = trim($_POST['CustName']);
$custAddress = trim($_POST['CustAddress']);
$custDOB = $_POST['CustDOB'];

if ($custName == ''  or $custAddress == '' or $custDOB == '' )
{
  echo("You did not complete the insert form correctly <br>");
  exit();
} 

else
{
  $dbcnx = mysqli_connect("localhost", "root", "", "dvdsys");
  
  // Check connection
  if (mysqli_connect_errno($dbcnx ))
  {
    echo "Failed to connect to MySQL: " .mysqli_connect_error();
    exit();
  }


  if ($_POST['submitdetails'] == "SUBMIT") 
  {
    $custName = mysqli_real_escape_string($dbcnx, $custName);
    $sql = "INSERT INTO customers(CustName, Address, DOB) VALUES('$custName', '$custAddress', '$custDOB')";
    $res = mysqli_query($dbcnx, $sql);

      if ($res == 0) 
      {
        echo("<p>Error registering: " . mysqli_error()  . "</p>");
      }
      
      else
      {
         echo("<a href='newCustomer.html'> Click here to enter another customer </a>");
      }                   
  }   

  mysqli_close($dbcnx);
}

?>