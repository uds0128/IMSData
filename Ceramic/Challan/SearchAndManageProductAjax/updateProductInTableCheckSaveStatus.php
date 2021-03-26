<?php
    include('./config.php');

    $data = file_get_contents("php://input");
    $mydata = json_decode($data, true);

    if(!empty($mydata))
    {
        mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);

        $pid = $mydata['pid'];
        $type = $mydata['type'];
        $subtypeid = $mydata['subtypeid'];
        $producttypeorcolor = $mydata['producttypeorcolor'];
        $brandid = $mydata['brandid'];
        $dimension = $mydata['dimension'];
        $qtyperunit = $mydata['qtyperunit'];
        $packingunit = $mydata['packingunit'];
        $gradeid = $mydata['gradeid'];
        $code = $mydata['code'];

        $checkForRecords = "SELECT COUNT(1) AS noofrecord FROM ProductMst Where "
                        ."  ProductSubCategoryID = ".$subtypeid." AND "
                        ."  ProductTypeColor='".$producttypeorcolor."' AND "
                        ."  SizeOrDimension='".$dimension."' AND "
                        ."  QtyPerUnit='".$qtyperunit."' AND "
                        ."  PackingUnit='".$packingunit."' AND "
                        ."  Code='".$code."' AND "
                        ."  BrandId =".$brandid."  AND "
                        ."  GradeId =".$gradeid."  AND "
                        ."  ProductMst.RecStatus = true";

        
        $resultcheckForRecords = mysqli_query($conn, $checkForRecords);

        if($resultcheckForRecords){

            $row = $resultcheckForRecords->fetch_assoc();
            $noofrecord = $row['noofrecord'];

            if($noofrecord == 0)
            {
                $updatequery = "UPDATE ProductMst SET "
                ."  ProductSubCategoryID = ".$subtypeid.", "
                ."  ProductTypeColor='".$producttypeorcolor."', "
                ."  SizeOrDimension='".$dimension."', "
                ."  QtyPerUnit='".$qtyperunit."', "
                ."  PackingUnit='".$packingunit."', "
                ."  Code='".$code."', "
                ."  ModifiedDate=CURRENT_DATE,  "
                ."  BrandId =".$brandid." , "
                ."  GradeId =".$gradeid."  "
                ."  WHERE ProductID = ".$pid." ";

                $resultupdatequery = mysqli_query($conn, $updatequery);

                if($resultupdatequery)
                {
                    if(!mysqli_commit($conn))
                    {
                        die("-6");  //  -3 => Commit Fail
                    }
                    else
                    {
                        echo "1"; //  1 => Success
                    }
                }
                else
                {
                    die("-5");  //   -5 => Error In Update Query 
                }
            }
            else if($noofrecord == 1)
            {
                die("-3");  // -3 => Record Already Exists
            }
            else
            {
                die('-4');  //  -4 => More Then One Record Found
            }
        }
        else
        {
            die("-2"); // -2 => Error In cheack Query
        }  
    }
    else
    {
        die("-1");  // -1 => Parameters Empty
    }
?>