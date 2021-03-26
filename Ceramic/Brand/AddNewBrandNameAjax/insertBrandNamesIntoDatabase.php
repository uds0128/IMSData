<?php
    include('./config.php');

    mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);

    $checkForRecord = "SELECT COUNT(1) AS noofrecord FROM brandnames where BrandName = '{$_POST['brandname']}' ";
    $result_checkForRecord = mysqli_query($conn, $checkForRecord);

    if($result_checkForRecord)
    {
        $row = $result_checkForRecord->fetch_assoc();
        $noofrecord = $row['noofrecord'];

        if($noofrecord == 0)
        {
            $query = "INSERT INTO brandnames (BrandName) value ('".$_POST['brandname']."')";
            $result = mysqli_query($conn, $query);
        
            if($result)
            {
                if(!mysqli_commit($conn))
                {
                    echo "-2"; // -2 => Error In Commit
                }
                else
                {
                    echo "1";  // 1 => Inserted Succesfully
                }
        
                //echo $query;
            }
            else
            {
                echo "-1"; // -1 => Error In Insert Executing Query
                //echo $query;
            }
        }
        else if($noofrecord == 1)
        {
           echo "-4";  //  -4 => Record Already Exists
        }
        else
        {
            echo "-5"; //  -5 ==> More then one Row FOund
        }
        
    }
    else
    {
        echo "-3"; // -2 ==> Error In Checking Record
    }

    
?>