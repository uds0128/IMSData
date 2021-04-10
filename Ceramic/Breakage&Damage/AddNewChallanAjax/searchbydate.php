<?php
    include('./config.php');
    //echo ($_POST['SysId']);
    //$query="SELECT * from Productmst join systable where Productmst.ProductId=systable.ProductId and systable.SysId=". $_POST['SysId']." and (BillingQty>0 or OtherQty>0) and RecStatus=true";
   // $query="SELECT * from Productmst join systable where Productmst.ProductId=systable.ProductId and systable.SysId=". $_POST['SysId']."";
    $query="SELECT * from Productmst, systable, stockdetails, brandnames, subcategories, categories where Productmst.ProductId=systable.ProductId and stockdetails.SysId=systable.SysId and Productmst.BrandId=brandnames.BrandId and Productmst.ProductSubCategoryId=subcategories.subcategory_id and subcategories.category_id=categories.category_id and Productmst.RecStatus=true and stockdetails.StockId=". $_POST['StockId']."  order by stockdetails.Createddate desc"; 
    //echo $query;
    $getStocks = mysqli_query($conn,$query);

    $dataToBeSent = array();

    if($getStocks){
        if(mysqli_num_rows($getStocks) > 0){
            $obj = array('FLAG' => 'RECORDFOUND');
            $dataToBeSent[] = $obj;

            while($row = $getStocks->fetch_assoc()){
                $category = $row['category_name'];
                $subcategory = $row['subcategory_name'];
                $brandname = $row['BrandName'];
                $hsncode = $row['ProductHSNCode'];
                $gradeid = $row['GradeId'];
                $colortype = $row['ProductTypeColor'];
                $dimension = $row['SizeOrDimension'];
                $qtyperunit = $row['QtyPerUnit'];
                $packingunit = $row['PackingUnit'];
                $code = $row['Code'];
                $gst=$row['ProductGST'];
                $baseprice = $row['BasePrice'];
                $billing_qty = $row['BillingQty'];
                $other_qty = $row['OtherQty'];
                $createddate = $row['Createddate'];
                $StockId = $row['StockId'];

                $obj = array('StockId' => $StockId,'category' => $category,'hsncode' => $hsncode,'gst' => $gst,'subcategory' => $subcategory,'brandname' => $brandname,'gradeid' => $gradeid,'colortype' => $colortype,'dimension' => $dimension,'qtyperunit' => $qtyperunit,'packingunit' => $packingunit,'code' =>$code,'billingqty' => $billing_qty, 'otherqty' => $other_qty, 'baseprice' => $baseprice, 'createddate' => $createddate);

                //$obj = array('category' => $category, 'subcategory' => $subcategory, 'brandname' => $brandname, 'hsncode' => $hsncode, 'grade' => $grade,'colortype' => $colortype,'dimension' => $dimension, 'qtyperunit' => $qtyperunit,'packingunit' => $packingunit,'codeno' => $codeno,'gstno' => $gstno);
                $dataToBeSent[] =$obj;
            }
            echo json_encode($dataToBeSent);
        }else{
            $obj = array('FLAG' => 'NORECORDFOUND' );
            $dataToBeSent[] = $obj;
            echo json_encode($dataToBeSent);
        }
    }else{
        $obj = array('FLAG' => 'ERRORINQUERY' );
        $dataToBeSent[] = $obj;
        echo json_encode($dataToBeSent);
    }
?>