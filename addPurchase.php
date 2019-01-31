<?php
$PurchaseDate = $_POST['purchDate'];
$DVDName = $_POST['dvdName'];
$CustName = $_POST['custName'];
$qty = $_POST['qty'];
$DVDPrice = $_POST['dvdPrice'];
$DVDNo = $_POST['dvdNo'];;
$CustID = $_POST['custID'];;

    if ($qty == ''  or $PurchaseDate == '')
    {
      echo("You did not complete the insert form correctly <br>");
      exit();
    } 
  
    if ($_POST['submitdetails'] == "SUBMIT")
    {      
        $dbcnx = mysqli_connect("localhost", "root", "", "dvdsys");
              
          if (mysqli_connect_errno($dbcnx))
          {
             echo "Failed to connect to MySQL: " .mysqli_connect_error();
             exit();
          }
                  
          else 
          {  
              $Price = (float)$DVDPrice*$qty;     
              $sql = "INSERT INTO purchases(PurchaseDate, Price, Qty, DVDNo, CustID)VALUES ('$PurchaseDate', '$Price', '$qty', '$DVDNo', '$CustID')";
              $res = mysqli_query($dbcnx, $sql);
              
              $sql2="UPDATE dvds SET QtyInStock = QtyInStock - $qty WHERE DVDNo=$DVDNo";  //code from http://stackoverflow.com/questions/14502765/how-to-reduce-item-quantity-when-checking-out-a-shopping-cart-in-php
              $res2 = mysqli_query($dbcnx, $sql2);

                    if ($res == 0 or $res2 == 0) 
                    {
                       echo("<p>Error purchasing: " . mysqli_error()  . "</p>");
                    }
      
                    else
                    {
                        echo("<a href='purchases.php'> Click here to purchase more DVDs<br> </a>");
                        echo("<a href='pTable.php'> Click here to view all purchases</a>");
                    }     
           }
               
          //free results
          mysqli_free_result($res, $res2);
  
          //close connection
          mysqli_close($dbcnx);
           
       } 
?> 
