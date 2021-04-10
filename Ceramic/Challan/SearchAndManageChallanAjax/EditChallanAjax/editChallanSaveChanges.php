<?php

    include('./config.php');
    $data = file_get_contents("php://input");
    $challandata = $_POST['challandata'];
    $challandata = json_decode($challandata, true);
    
    $challanid = $challandata[0]['challanid'];
    $discount = $challandata[0]['discount'];
    $transportationcost = $challandata[0]['transportationcost'];
    $extracostdesc = $challandata[0]['extracostdesc'];
    $extracost = $challandata[0]['extracost'];
    $payedamount = $challandata[0]['payedamount'];

    $n = count($challandata);
    mysqli_autocommit($conn, false);
    $total = 0;
    for($i = 1; $i<$n; $i++){

        $stockid           = $challandata[$i]['stockid'];
        $oldbillingqty     = $challandata[$i]['oldbillingqty'];
        $oldotherqty       = $challandata[$i]['oldotherqty'];
        $billingqty        = $challandata[$i]['billingqty'];
        $otherqty          = $challandata[$i]['otherqty'];
        $sellingprice      = $challandata[$i]['sellingprice'];
        $updatebillingqty  = $billingqty - $oldbillingqty;
        $updateotherqty    = $otherqty - $oldotherqty;

        $total = (intval($billingqty) + intval($otherqty))* floatval($sellingprice);

        $editInChallanDetails = "UPDATE challandetails SET BillingQty = BillingQty + ({$updatebillingqty}) , OtherQty = OtherQty + ({$updateotherqty}), SellingPrice = {$sellingprice} WHERE ChallanId = {$challanid} and StockId= {$stockid}";
        $result_editInChallanDetails = mysqli_query($conn, $editInChallanDetails);
        $updateStockDetails = "UPDATE stockdetails SET BillingQty = BillingQty - ({$updatebillingqty}), OtherQty = OtherQty - ({$updateotherqty}) WHERE StockId = {$stockid}";
        $result_updateStockDetails = mysqli_query($conn, $updateStockDetails);

        if(!$result_editInChallanDetails && !$result_updateStockDetails){
            mysqli_rollback($conn);
            mysqli_autocommit($conn, true);
            die("-1"); // -1 => error in challandetails or stockdetails Query
        }
    }
    $subtotal = $total - floatval($discount) + floatval($transportationcost) + floatval($extracost);
    $dueamount = $subtotal - floatval($payedamount);

    $editInChallanMst = "UPDATE challanmst SET Discount = '{$discount}', TransportCost = '{$transportationcost}', ExtraCostDesc = '{$extracostdesc}', ExtraCost = '{$extracost}', ModifiedDate = now(), TotalAmount = {$total}, DueAmount = {$dueamount} WHERE ChallanId = {$challanid}";
    $result_editInChallanMst = mysqli_query($conn, $editInChallanMst);
    //echo $editInChallanMst;
    if(!$result_editInChallanMst){
        mysqli_rollback($conn);
        mysqli_autocommit($conn, true);
        die("-2"); // -2v => Error In Challan Mst Update Query
    }

    if($dueamount == 0){
        $pendingstatus = "Complete";
    }
    else{
        $pendingstatus = "Pending";
    }
    $updateInPayment = "UPDATE tblinwardpayment SET AmountPaid = {$payedamount}, AmountPending = {$dueamount}, Status = '{$pendingstatus}', ModifiedDate=now() WHERE ChallanId = {$challanid}";
    $result_updateInPayment = mysqli_query($conn, $updateInPayment);

    if(!$result_updateInPayment){
        mysqli_rollback($conn);
        mysqli_autocommit($conn, true);
        die("-3"); // -3 => Error In Update Payment Update Query
    }

    if(mysqli_commit($conn)){
        mysqli_autocommit($conn, true);
        echo "1";
    }
    else{
        mysqli_rollback($conn);
        mysqli_autocommit($conn, true);
        die("-4"); // -4=> Commit Fail
    }
?>