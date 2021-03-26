<?php

include 'connection.php';

$id = @$_GET['id'];

$delete = " UPDATE tblinwardbillmst SET RecStatus = 0, ModifiedDate = NOW() WHERE InwardId LIKE $id ";

$del=mysqli_query($conn, $delete);

if($del)
{   
    echo "<script>window.open('s&minward.php','_self')</script>";
  
}
?>