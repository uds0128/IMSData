<?php

    include('./config.php');
    $billqty = $_POST['val1'];
    $otherqty=$_POST['val2'];
    $id=$_POST['val3'];

    $result = mysqli_query($conn, "UPDATE stockdetails SET BillingQty=BillingQty-'$billqty',OtherQty=OtherQty-'$otherqty' where Stockid='$id'");
    $result1=mysqli_query($conn, "UPDATE stockdetails SET DateAdded=curdate() where StockId='$id'");
   // if($result)
     // {
         //echo "<script>console.log('done2')</script>";
        // $link= "<script>window.open('Breakage&Damage.php')</script>";
     // }

?>