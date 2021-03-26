<?php
    include('./config.php');
    $data = file_get_contents("php://input");
    $mydata = json_decode($data, true);
    $c_id = $mydata['cid'];
    $category_name = $mydata['cname'];
    
    //if(!empty($cid))
    
    //echo empty($c_id);

    if($c_id != '' && $category_name != '')
    {
        

        //$query2 = "UPDATE ProductMst set ProductType ='".$category_name."'";
        //$result2 = mysqli_query($conn, $query2);
        //if($result2 == true)
        //{
            $query = "UPDATE categories set category_name ='".$category_name."' WHERE category_id=".$c_id;
            $result = mysqli_query($conn, $query);
            if($result == true)
            {
                echo true;
            }
            else
            {
                echo false;     
            }
        //}
        //else
        //{
            //echo false;
        //}
    }
    else
    {
        echo false;
    }
?>