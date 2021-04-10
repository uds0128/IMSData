<?php
    require('../fpdf/fpdf.php');
    include('./config.php');
    include('./pdf.php');
    


    $gst_no = "37AAACI1681G2ZN";
    $challan_date = "08/02/2021";
    $challan_no = "08022021/001";

    $checkForCustomerName = "SELECT * FROM CustomerMst WHERE CustomerId = {$_GET['custid']}";
    $result_checkForCustomerName = mysqli_query($conn, $checkForCustomerName);

    $row = $result_checkForCustomerName -> fetch_assoc();

    $customer_name = $row['CustomerName'];


    $pdf = new PDF($customer_name,$challan_no,$challan_date,$company_no);
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->Output('Uddhav.pdf', 'D');
    

 

    
?>
