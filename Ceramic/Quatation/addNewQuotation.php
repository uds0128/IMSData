<?php
    include('./config.php');
    $data = file_get_contents("php://input");

    $name = $_POST['name'];
    $date = $_POST['date'];
    $tbl  = $_POST['datatable'];
 
    $totalamount = $_POST['totalamount'];
    $gstamount   = $_POST['gstamount'];
    $netamount   = $_POST['netamount'];
    $tbl  = json_decode($tbl, true);

    $dataToBeSent = array();

    mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);

    $insertIntoQuotationMst =  "INSERT INTO TblQutationMst (Name, QDate, TotalPrice, TotalGST, TotalAmount) VALUES ('".$name."', '{$date}', {$totalamount}, {$gstamount}, {$netamount})";
    $result_insertIntoQuotationMst = mysqli_query($conn, $insertIntoQuotationMst);

    if($result_insertIntoQuotationMst)
    {
        $n = count($tbl);
        $last_insert_id = mysqli_insert_id($conn);
        $insertIntoQuotationDetails = "INSERT INTO tblqutationdetails (ItemNo, Discription, Qty, Rate, Gst, QutationId) VALUES ";
        for($i = 0; $i<$n; $i++)
        {
            $insertIntoQuotationDetails .=
            "({$i},'".$tbl[$i]['Description']."', {$tbl[$i]['Qty']}, {$tbl[$i]['Rate']}, {$tbl[$i]['GST']}, {$last_insert_id} ), ";
        }
        $insertIntoQuotationDetails = rtrim($insertIntoQuotationDetails, ", ");
        $insertIntoQuotationDetails .= ";";
        $result_insertIntoQuotationDetails = mysqli_query($conn, $insertIntoQuotationDetails);

        if($result_insertIntoQuotationDetails)
        {
            if(!mysqli_commit($conn))
            {
                $flag = array('FLAG' => 'COMMITFAIL');
                $dataToBeSent[] = $flag;

                echo json_encode($dataToBeSent);
            }
            else
            {
                $flag = array('FLAG' => 'SUCCESS');
                $dataToBeSent[] = $flag;

                $quotationid = array('QID' => $last_insert_id);
                $dataToBeSent[] = $quotationid;

                echo json_encode($dataToBeSent);
            }
        }
        else
        {
            $flag = array('FLAG' => 'ERRINQUOTATIONDETAILS');
            $dataToBeSent[] = $flag;

            echo json_encode($dataToBeSent);
        }
    }
    else
    {
        $flag = array('FLAG' => 'ERRINQUOTATIONMST');
        $dataToBeSent[] = $flag;
         
        echo json_encode($dataToBeSent);
    }

?>