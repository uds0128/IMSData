<?php 
    include('./config.php');

  //$query = "SELECT stockdetails.StockId FROM stockdetails,systable where stockdetails.SysId=systable.SysId and Createddate>= '". $_POST['InitialDate']."' and Createddate<= '". $_POST['FinalDate']."' order by Createddate desc";
    // $getSysId = mysqli_query($conn,$query);
    // if($getSysId->num_rows > 0){
    //     $flag = array('FLAG' => 'OKK');
    //     $dataToBeSent[] = $flag;
    //     while($row = $getSysId->fetch_assoc()){
    //         $SysId = $row['SysId'];

    //         $obj = array('SysId' => $SysId);
    //         $dataToBeSent[] = $obj;
    //     }
        
    //     // for ($x = 0; $x <3; $x++) {
    //     //     echo $dataToBeSent[$x];
    //     //   }
    //     echo $dataToBeSent[1];
    // }

    // $queryPid ="SELECT stockdetails.StockId FROM stockdetails,systable where stockdetails.SysId=systable.SysId and stockdetails.SysId='$getSysId'";
    $queryPid ="SELECT StockId FROM stockdetails,systable where stockdetails.SysId=systable.SysId and Createddate>= '". $_POST['InitialDate']."' and Createddate<= '". $_POST['FinalDate']."' order by Createddate desc";
    //SELECT * FROM stockdetails where Createddate>= "2021-3-25" and Createddate<= "2021-4-1"
    //echo $queryPid;
    
    $getStockId = mysqli_query($conn,$queryPid);
    $dataToBeSent = array();

    if($getStockId){
        if($getStockId->num_rows > 0){
            $flag = array('FLAG' => 'OKK');
            $dataToBeSent[] = $flag;
            while($row = $getStockId->fetch_assoc()){
                $StockId = $row['StockId'];

                $obj = array('StockId' => $StockId);
                $dataToBeSent[] = $obj;
            }
            echo json_encode($dataToBeSent);
        }else{
            $obj = array('FLAG' => 'RECORDNOTFOUND');
            $dataToBeSent[] = $obj;
            echo json_encode($dataToBeSent);
        }
    }else{
        $obj = array('FLAG' => 'ERRORINEXECUTINGQUERY');
        $dataToBeSent[] = $obj;
        echo json_encode($dataToBeSent);
    }
?>