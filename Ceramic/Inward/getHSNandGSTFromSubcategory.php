<?php
    include('./config.php');
    
    $subcatname = $_POST['subcatname'];
  
        $cheakforSubcatid = "SELECT * FROM Subcategories Where Subcategory_name = '{$subcatname}'";
        $result_checkForSubcatid = mysqli_query($conn, $cheakforSubcatid);


        if($result_checkForSubcatid)
        {

            $row = $result_checkForSubcatid->fetch_assoc();
            $subcatid = $row['subcategory_id'];

            //echo $subcatid;

            $query = "SELECT ProductHSNCode, ProductGST FROM Subcategories Where active_status=true and subcategory_id={$subcatid}";
            $dataToBeSent = array();

    
            $result = mysqli_query($conn, $query);

            if($result)
            {
                if($result->num_rows > 0)
                {
                    $flag = array('FLAG' => 'OK');
                    $dataToBeSent[] = $flag;

                    while($row = $result->fetch_assoc())
                    {
                        $hsn = $row['ProductHSNCode'];
                        $gst = $row['ProductGST'];

                        $obj = array('gst' => $gst, 'hsn' => $hsn);
                        $dataToBeSent[] = $obj;
                    }
                    echo json_encode($dataToBeSent);
                }
                else
                {
                    $flag = array('FLAG' => 'NORECORDFOUND');
                    $dataToBeSent[] = $flag;

                    echo json_encode($dataToBeSent);
                }
            }
            else
            {
                $flag = array('FLAG' => 'ERRINFINDINGHSNANDGST');
                $dataToBeSent[] = $flag;
        
                echo json_encode($dataToBeSent);
            }
        }
        else
        {
            $flag = array('FLAG' => 'ERRFINDINGSUBCATID');
            $dataToBeSent[] = $flag;
    
            echo json_encode($dataToBeSent);
        }
?>