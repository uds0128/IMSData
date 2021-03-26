<?php
    include('./config.php');
    $data = file_get_contents("php://input");
    $myrowdata = json_decode($data,true);
    $mydata = array_values( array_unique( $myrowdata, SORT_REGULAR));
    $no_of_rows = count($mydata);
    $count=1;

    mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);

    for($i=0; $i<$no_of_rows; $i++)
    {
        $type = $mydata[$i]['Type'];
        $subcatid = $mydata[$i]['SubCategoryId'];
        $typeorcolor = $mydata[$i]['Type/Color'];
        $brandid = $mydata[$i]['BrandId'];
        $dimension = $mydata[$i]['Dimension'];
        $qty = $mydata[$i]['Qty'];
        $packingunit = $mydata[$i]['PackingUnit'];
        $gradeid = $mydata[$i]['GradeId'];
        $code = $mydata[$i]['Code'];
        

        $searchIntoProductMst = "SELECT COUNT(1) AS noofrecord FROM productmst WHERE "
                    ."ProductSubCategoryID='".$subcatid."' AND "
                    //."ProductHSNCode='".$hsncode."' AND "
                    ."ProductTypeColor='".$typeorcolor."' AND "
                    ."BrandId='".$brandid."' AND "
                    ."SizeOrDimension='".$dimension."' AND "
                    ."QtyPerUnit=".$qty." AND "
                    ."PackingUnit='".$packingunit."' AND "
                    ."GradeId='".$gradeid."' AND "
                    ."Code='".$code."' ";


        $resultsearchIntoProductMst = mysqli_query($conn, $searchIntoProductMst); 
        $row = $resultsearchIntoProductMst -> fetch_assoc();
        $noofrecord = $row['noofrecord'];

        if($noofrecord == 0)
        {
            $insertIntoProductMst = "INSERT INTO productmst (ProductSubCategoryID, ProductTypeColor, SizeOrDimension, QtyPerUnit, PackingUnit, Code, BrandId, GradeId) VALUES "
                    ."("
                        ." ".$subcatid.", "
                        //."'".$hsncode."', "
                        ."'".$typeorcolor."', "
                        ."'".$dimension."', "
                        ."".$qty.", "
                        ."'".$packingunit."', "
                        ."'".$code."', "
                        ." ".$brandid.", "
                        ." ".$gradeid." "
                    .")";
            //echo $insertIntoProductMst;
            $resultinsertIntoProductMst = mysqli_query($conn, $insertIntoProductMst);

            if(!$resultinsertIntoProductMst)
            {
                echo "-2";  //  -2 ==> Error While Inserting Into Product Mst
            }
        }
        else if($noofrecord == 1)
        {
            echo "-3";  //  -3 ==> Record All Ready Exista
        }
        else
        {
            echo "-4";  //  -4 ==> More Then One Record Found
        }
        $count++;
    }

    if(!mysqli_commit($conn))
    {
        echo "-1";  //  -1 ==> Commit Failure
    }
    else
    {
        echo "1";  //  1 ==>  Successfully
    }

?>