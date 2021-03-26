<?php
    include('./config.php');
    $data = file_get_contents("php://input");
    $mydata = json_decode($data, true);
    $category_id = $mydata['cid'];
    $subcategory_name = $mydata['scname'];
    $hsncode = $mydata['hsncode'];
    $gst = $mydata['gst'];

    
    if($subcategory_name != '' && $category_id != '-1' && $hsncode != '' && $gst != '')
    {
        $checkrecordalreadyexists = mysqli_query($conn, "SELECT COUNT(1) AS noofrecord FROM subcategories where subcategory_name = '".$subcategory_name."' and category_id = ".$category_id." and ProductHSNCode = '".$hsncode."' and ProductGST=".$gst." and subcategories.active_status  = true");
        //echo $checkrecordalreadyexists;
        if($checkrecordalreadyexists)
        {   
            $row = $checkrecordalreadyexists->fetch_assoc();
            
            if($row['noofrecord'] == 0)
            {
                mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
                $query = "INSERT INTO subcategories (subcategory_name, category_id, ProductHSNCode, ProductGST) VALUES ('".$subcategory_name."','".$category_id."','".$hsncode."', ".$gst.")";
                $result = mysqli_query($conn, $query);

                if($result)
                {
                    if(!mysqli_commit($conn))
                    {
                        echo 'COMMITFAIL';
                    }
                    else
                    {   
                        echo "OKK";
                    }
                }
                else
                {
                    echo "ERRORINUPDATING";
                }
            }
            else if($row['noofrecord'] == 1)
            {
                echo "RECORDFOUND";
            }
            else
            {
                echo "MORERECORD";
            }
        }
        else
        {
            echo "ERRINCHEACKING";
        }
    }
    else
    {
        echo "PARAMEMPTY";
    }

?>