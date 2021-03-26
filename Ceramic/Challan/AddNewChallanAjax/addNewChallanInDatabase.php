<?php 
    include('./config.php');

    $data = file_get_contents("php://input");
    $mydata = json_decode($data, true);
    
    $custid = $mydata[0]['customerId'];
    $totalamt=$mydata[0]['totalamt'];
    $discount=$mydata[0]['discount'];
    $transport=$mydata[0]['transport'];

    $dataToBeSent = array();
    mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
    if($custid!=""){
        $n=count($mydata);
        
        $insertIntoChallanMst = "INSERT into challanmst (CustomerId, TotalAmount, Discount, TransportCost) value (".$custid.", ".$totalamt.", ".$discount.", ".$transport.")";
        $resultinsertIntoChallanMst = mysqli_query($conn,$insertIntoChallanMst);

        if($resultinsertIntoChallanMst){
            $last_Challan_id = mysqli_insert_id($conn);

            
            $insertIntoChallanDetails="";
            $updateIntoStockMst="";
            $billingQty= " BillingQty = BillingQty - ";
            $otherQty= " OtherQty = OtherQty - ";
            for ($i=1; $i<$n ; $i++) { 
                $stockid=$mydata[$i]['stockid'];
                $billqty=$mydata[$i]['billqty'];
                $otherqty=$mydata[$i]['otherqty'];
                $sellprice=$mydata[$i]['sellprice'];
                $insertIntoChallanDetails = "INSERT into ChallanDetails (ChallanId, StockId, BillingQty, OtherQty, SellingPrice) value (".$last_Challan_id.", ".$stockid.", ".$billqty.", ".$otherqty.", ".$sellprice.")";
                $resultinsertIntoChallanDetails = mysqli_query($conn,$insertIntoChallanDetails);
                $updateIntoStockMst = "UPDATE StockDetails SET ".$billingQty." ".$billqty.", ".$otherQty." ".$otherqty." where StockId = ".$stockid." ;";
                $resultupdateIntoStockMst = mysqli_query($conn,$updateIntoStockMst);
                if(!$resultinsertIntoChallanDetails || !$resultupdateIntoStockMst)
                {
                    $flag = array('FLAG' => 'MIDERR');
                    $dataToBeSent[] = $flag;
                    echo json_encode($dataToBeSent);
                }
                $insertIntoChallanDetails ="";
                $resultinsertIntoChallanDetails = null;
                $updateIntoStocksMst = "";
                $resultupdateIntoStocksMst = null;
            }
            if(!mysqli_commit($conn)){
                $flag = array('FLAG' => 'ERRCOMMIT');
                $dataToBeSent[] = $flag;
                echo json_encode($dataToBeSent);
            }else{
                $flag = array('FLAG' => 'SUCCESS');
                $dataToBeSent[] = $flag;

                $obj = array('CHALLANID' => $last_Challan_id);
                $dataToBeSent[] = $obj;
                echo json_encode($dataToBeSent);
            }

        }else{
            $flag = array('FLAG' => 'ERRINSERTMST');
            $dataToBeSent[] = $flag;
            echo json_encode($dataToBeSent);
        }
    }
    else
    {
        $flag = array('FLAG' => 'PARAMEMPTY');
        $dataToBeSent[] = $flag;
        echo json_encode($dataToBeSent);   
    }
?>