<?php

    include('./config.php');
    $billqty = $_POST['val1'];
    $otherqty=$_POST['val2'];
    $id=$_POST['val3'];
    //$date1=mysqli_query($conn, "SELECT CURDATE()");
    
    $result = mysqli_query($conn, "UPDATE stockdetails SET BillingQty='$billqty',OtherQty='$otherqty' where StockId='$id'");
    $result1=mysqli_query($conn, "UPDATE stockdetails SET DateAdded=curdate() where StockId='$id'");
   
   // if($result)
     // {
         //echo "<script>console.log('done2')</script>";
        // $link= "<script>window.open('Breakage&Damage.php')</script>";
     // }

?>