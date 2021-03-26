<?php
    include('./config.php');
    $data = file_get_contents("php://input");
    $mydata = json_decode($data, true);
    $sc_id = $mydata['scid'];
    $subcategory_name = $mydata['scname'];
    $hsncode = $mydata['hsncode'];
    $gst = $mydata['gst'];
    
    //if(!empty($cid))
    
    //echo empty($c_id);

    if($sc_id != '' && $subcategory_name != '' && $hsncode != '' && $gst != '')
    {
        $cheakforalreadyexists = mysqli_query($conn, "SELECT COUNT(1) AS noofrecord FROM subcategories where subcategory_name = '".$subcategory_name."' and ProductHSNCode='".$hsncode."' and ProductGST = ".$gst);
        if($cheakforalreadyexists)
        {
            mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
            $row = $cheakforalreadyexists->fetch_assoc();
            $noofrecord = $row['noofrecord'];

            if($noofrecord == 0)
            {
                $query = "UPDATE subcategories set subcategory_name ='".$subcategory_name."', ProductHSNCode='".$hsncode."', ProductGST=".$gst."  WHERE subcategory_id=".$sc_id;
                $result = mysqli_query($conn, $query);

                if($result)
                {   
                    if(!mysqli_commit($conn))
                    {
                        echo "COMMITFAIL";
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
            else if($noofrecord == 1)
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