<!DOCTYPE html>
<html lang="en">
<?php include('./config.php');?>

<head>
    <title>Breakage And Damage</title>
    <!-- <script data-main="scripts/app" src="scripts/require.js"></script> -->
    <style type="text/css">
        .grid1 {
            display: grid;
            width: '100%';
            grid-template-columns: '50px 1fr';
        }

        /* for removing arrow buttons in muber type field. */
        input[type=number] {
            -moz-appearance: textfield;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .txt-box {
            border-radius: 5px;
        }

        td {
            text-align: center;
        }

        thead th {
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: aqua;
        }

        thead {
            background-color: grey;
        }

        .purchase-qty {
            width: 10px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="chosen/chosen.css">
    <script src="chosen/chosen.jquery.js" type="text/javascript"></script>
    <script>



        function checkRadio(radio) {
            if (radio.id === "complete") {
                document.getElementById("rpy").value = "0";
                document.getElementById("rpy").readOnly = true;
                document.getElementById("RemAmt").style.display = "none";
            } else if (radio.id === "pending") {
                document.getElementById("RemAmt").style.display = "block";
            }
        }

        function calrem() {
            var tot = parseInt(document.getElementById('tp').value);
            var pen = parseInt(document.getElementById('Amt').value);
            var remain = tot - pen;
            document.getElementById('rpy').value = remain;
        }

        function cancelField() {
            document.getElementById("ExtraCost").innerHTML = "";
            document.getElementById("addOtherCharge").disabled = false;
        }

        function SomeDeleteRowFunction(o) {
            var p = o.parentNode.parentNode;
            p.parentNode.removeChild(p);
        }

    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<?php 
    // $month = date('m');
    // $day = date('d');
    // $year = date('Y');
    // // $num=1;
    
    // $today = $year . '-' . $month . '-' . $day;
    // $num=str_pad($num, 3, "0", STR_PAD_LEFT);
    // $challanNo = $year.$month.$num;
    // include('./config.php');
    // $query="SELECT DateAdded from stockdetails where ";
    // //echo $query;
    // $getStocks = mysqli_query($conn,$query);
?>

<body>
    <div class="container-fluid col-lg-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #2B60DE">
                        <center>
                            <h3 class="card-title" style="color: white">Breakage And Damage</h3>
                        </center>
                        <?php //echo $challanNo;?>
                    </div>
                    <div class="card-body">
                        <!-- <div class="row">

                            <div class="col-md-2">
                                <label class="form-label mt-1" style="margin-left: 2px">Date:</label>
                                <input type="date" id="getChallanDate" name="getChallanDate" class="form-control"
                                    value="<?php echo $today; ?>">
                            </div>

                        </div> -->

                        <hr>

                        <div class="row mt-3">
                            <div class="form-group col-md-1">
                                <label class="form-label">Product Type: </label>
                            </div>
                            <div class="col-md-2">
                                <select id="category_name"
                                    class="form-select col-md-12 resetsearchparam class-category">
                                    <option value='-1' selected>Select</option>
                                    <?php
                                      $query = "SELECT category_id ,category_name FROM categories where active_status=true";
                                      $result = mysqli_query($conn, $query);
                                        if($result)
                                        {
                                            while($row = $result -> fetch_assoc())
                                            {
                                                $category_id = $row['category_id'];
                                                $category_name = $row['category_name'];
                                                echo
                                                    //"<option value='".$category_id."' cid=".$category_id.">".$category_name."</option>";
                                                    "<option value='".$category_id."'>".$category_name."</option>";
                                            }
                                        }
                                        else
                                        {
                                            echo "<script>alert('Something Went Wrong');</script>";
                                            location.reload(true);
                                        }
                                     ?>
                                </select>
                            </div>

                            <div class="form-group col-md-1" style="width:12%;">
                                <label class="form-label">Product Sub Type: </label>
                            </div>
                            <div class="col-md-2">
                                <select id="subcategories" class="form-select resetsearchparam class-subcategory">
                                    <option value='-1'>Select</option>
                                </select>
                            </div>

                            <div class="col-md-1">
                                <label class="form-label">Brand Name: </label>
                            </div>
                            <div class="col-md-2">
                                <select id="getbrandname" class="form-select resetsearchparam class-brand">
                                    <option value='-1'>Select</option>
                                </select>
                            </div>

                            <div class="col-md-1">
                                <label class="form-label">HSN Code: </label>
                            </div>
                            <div class="col-md-1" style="width: 10%;">
                                <input type="number" name="HSN" class="form-control" id='hsn'
                                    onKeyPress="if(this.value.length==8) return false;" disabled>
                            </div>
                        </div>

                        <div class="row mt-3">

                            <div class="col-md-1">
                                <label class="form-label">Grade : </label>
                            </div>
                            <div class="col-md-2">
                                <select id="getgrade" class="form-select col-md-12 resetsearchparam class-grade">
                                    <option value='-1' selected>Select</option>

                                </select>
                            </div>

                            <div class="col-md-1" style="width: 12%;">
                                <label class="form-label">Product Type/Color : </label>
                            </div>
                            <div class="col-md-2">
                                <select name='getProductTypeColor' class="form-control form-select resetsearchparam"
                                    id="getProductTypeColor">
                                    <option value="-1">Select</option>

                                </select>
                            </div>

                            <div class="col-md-1">
                                <label class="form-label">Dimension : </label>
                            </div>
                            <div class="col-md-2">
                                <select id="getdimension" class="form-select col-md-12 resetsearchparam">
                                    <option value='-1' selected>Select</option>

                                </select>
                            </div>

                            <div class="col-md-1">
                                <label class="form-label">GST : </label>
                            </div>
                            <div class="col-md-1" style="width: 10%;">
                                <input type="number" name="gst" class="form-control" id='gst' disabled>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-1">
                                <label class="form-label">Qty Per Unit : </label>
                            </div>
                            <div class="col-md-2">
                                <select class='form-select resetsearchparam' name="" id="getqtyperunit">
                                    <option value="-1">Select</option>
                                </select>
                            </div>

                            <div class="col-md-1" style="width: 12%;">
                                <label class="form-label">Packing Unit : </label>
                            </div>
                            <div class="col-md-2">
                                <select class='form-select resetsearchparam' name="" id="getpackingunit">
                                    <option value="-1">Select</option>
                                    <option value="kg">KG</option>
                                    <option value="Piece">Piece</option>
                                </select>
                            </div>
                            <div class="col-md-2" style="width:18%;">
                                <label class="form-label">Code No./Model No./Design No.: </label>
                            </div>

                            <div class="col-md-2">
                                <select id="getcode" class="form-select col-md-12 resetsearchparam">
                                    <option value='-1' selected>Select</option>

                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-1">
                                <input type="Button" value="Search" id="searchbtn" class="btn btn-success">
                            </div>
                            <div class="col-md-1">
                                <input type="text" id="pid" hidden>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <table id="searchedTable">
                        <thead>
                            <th>Type</th>
                            <th>Sub<br>Type</th>
                            <th>HSN<br>Code</th>
                            <th>Type/<br>Color</th>
                            <th>Brand</th>
                            <th>Dimension</th>
                            <th>Qty/Unit</th>
                            <th>Packing<br>Unit</th>
                            <th>Grade</th>
                            <th>Code</th>
                            <th>GST</th>
                            <th>Billing<br>Qty</th>
                            <th>Other<br>Qty</th>
                            <th>Base<br>Price</th>
                            <th>Date</th>
                            <th>Action</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card card-header">
                        <center>
                            <h2 class="card-titile">Purchased Items</h2>
                        </center>
                    </div>

                    <div class="card card-body">

                    </div>
                    <table id="purchasedTable">
                        <thead>
                            <th>Type</th>
                            <th>Sub<br>Type</th>
                            <th>Type/<br>Color</th>
                            <th>Brand</th>
                            <th>Dimension</th>
                            <th>Qty/<br>Unit</th>
                            <th>Packing<br>Unit</th>
                            <th>Grade</th>
                            <th>Code</th>
                            <th>Base<br>Price</th>
                            <th>Date</th>
                            <th>Billing<br>Qty</th>
                            <th>Other<br>Qty</th>
                            <th>Broken Products<br>Billing Qty</th>
                            <th>Broken Products<br>Other Qty</th>
                            <!-- <th>Selling<br>Price</th> -->
                            <th></th>
                            <th>Action</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript">
    var stockIdsToBePurchased = new Set();
    $(function () {


        ReloadSubcategoriesSelectMenu();
        ReloadGradeSelectMenu();
        ReloadBrandSelectMenu();
        ReloadDimesionSelectMenu();
        ReloadQtyPerUnitSelectMenu();
        ReloadProductTypeColorMenu();
        ReloadCodeSelectMenu();

        var cid;
        $("#getCustomerName").prop('disabled', true).chosen();
        $("#getCustomerName").prop('disabled', true).trigger("chosen:updated");

        $('#addOtherCharge').click(function () {
            $('#ExtraCost').append(
                '<form class="row g-3">' +
                '<div class="form-group col-md-1" style="margin-left: 30px; margin-top: 30px;" id="AddChargesRs.">' +
                '<input type="text" name="extraCost" class="form-control col-md-2" id="extraCost" placeholder="Extra Cost">' +
                '</div>' +
                '<div class="form-group col-md-4" style="margin-top: 30px;" id="AddChargesDes">' +
                '<input type="text" name="extraCostDes" class="form-control" id="extraCostDes" placeholder="Description of Extra Cost">' +
                '</div>' +
                '<div class="form-group col-md-1" style="margin-top: 35px;" id="CancelField" >' +
                '<button type="button" class="btn-close" id="closeButton" onclick="cancelField()"></button>' +
                '</div>' +
                '<div></div>' +
                '</form>'
            );
            $('#addOtherCharge').attr("disabled", true);
        });

        $('input[type=radio][name=customer]').change(function () {
            if (this.id == 'ec') {

                $.ajax({
                    type: 'POST',
                    url: "./AddNewChallanAjax/getCustomerName.php",
                    dataType: "json",
                    success: function (Data) {
                        console.log(Data);
                        if (Data[0].FLAG == "SUCCESS") {
                            let n = Data.length;
                            for (let i = 1; i < n; i++) {
                                $("#getCustomerName").append(new Option(Data[i].customerName + " " + Data[i].customerNo, Data[i].customerId));
                            }
                            $('#getCustomerName').prop('disabled', false).chosen();
                            $('#getCustomerName').prop('disabled', false).trigger("chosen:updated");
                        }
                        else if (Data[0].FLAG == "NORECORDFOUND") {
                            console.log("NO RECORD FOUND");
                            alert('No Record Found');
                        }
                        else if (Data[0].FLAG == "ERRORINQUERYEXECUTION") {
                            console.log("ERROR IN QUERY EXECUTION");
                            alert('oh no');
                        }
                        else {
                            console.log("ERROR");
                            alert('what');
                        }
                    },
                    error: function (Data) {

                    }
                });
            }
            else if (this.id == 'nc') {
                $("#getCustomerName").prop('disabled', true).chosen();
                $("#getCustomerName").prop('disabled', true).trigger("chosen:updated");
                window.location.href = '../Customer/NewCustomer.php';
            }
        });

        // $("#closechallan").click(function () {
        //     //window.location.href = '../Ceramic/admin.php';
        // });

        function validateChallanMetaData() {
            var challanDate = $("#getChallanDate").val();
            var customerId = $("#getCustomerName").val();
            if (challanDate != '' && customerId != "-1") {
                return true;
            }
            else {
                return false;
            }
        }

        $("#category_name").on('change', function () {

            ResetSelectMenu($("#subcategories"));
            ResetSelectMenu($("#getbrandname"));
            ResetSelectMenu($("#getgrade"));
            $("#hsn").val(" ");
            $("#gst").val(" ");
            $("#searchedTable tbody").empty();
            let cid = $('#category_name').val();
            console.log(cid);

            if (cid != '-1') {
                console.log('Hello');
                $.ajax({
                    type: "POST",
                    url: "./AddNewChallanAjax/getSubcategoriesFromCategories.php",
                    data: { cid: cid },
                    dataType: "json",
                    success: function (Data) {
                        console.log(Data);
                        if (Data[0].FLAG == 'OK') {
                            let n = Data.length;
                            for (let i = 1; i < n; i++) {
                                scn = Data[i].scn;
                                sci = Data[i].sci;
                                $("#subcategories").append(new Option(scn, sci));
                            }
                        }
                        else if (Data[0].FLAG == "NORECORDFOUND") {
                            console.log("No Subcategory Found For Given Category");
                            alert('No Subcategory Found For Given Category');
                        }
                        else if (Data[0].FLAG == "NOTOK") {
                            console.log("Error In Executing Query");
                            alert("Something Went Wrong");
                        }
                        else {
                            console.log('Other Response Found');
                            alert('Something Went Wrong');
                        }
                    },
                    error: function (Data) {
                        console.log("Error In Ajax Call In Categories Change Event");
                        alert('Something Went Wrong');
                        console.log(Data.status);
                        console.log(Data.statusText);
                        console.log(Data.responseText);
                    }
                });
            }
            else {
                ReloadSubcategoriesSelectMenu();
            }
        });

        $("#subcategories").on('change', function () {
            ResetSelectMenu($("#getbrandname"));
            ResetSelectMenu($("#getgrade"));
            $("#hsn").val(" ");
            $("#gst").val(" ");
            $("#searchedTable tbody").empty();
            var subcatid = $("#subcategories").val();
            console.log(subcatid);
            if (subcatid != "-1") {
                $.ajax({
                    type: "POST",
                    url: "./AddNewChallanAjax/getBrandsFromSubcategory.php",
                    data: { subcatid: subcatid },
                    dataType: 'json',
                    success: function (Data) {
                        console.log(Data);
                        if (Data[0].FLAG == "OKK") {
                            var n = Data.length;

                            for (var i = 1; i < n; i++) {
                                $("#getbrandname").append(new Option(Data[i].brandname, Data[i].brandid));
                                //$("#selectbrand").append('<option value='+Data[i].brandid+' showvalue='+Data[i].brandname+'>'+Data[i].brandname+'</option>');
                            }
                        }
                        else if (Data[0].FLAG == "RECORDNOTFOUND") {
                            console.log("No Brands Found For Selected Category And Subcategory");
                            alert("No Brands Found For Selected Category And Subcategory");
                        }
                        else if (Data[0].FLAG == 'ERRORINEXECUTINGQUERY') {
                            console.log("ERROR IN EXECUTING QUERY");
                            alert("Something Went Wrong");
                        }
                        else {
                            console.log('Other Then Flag');
                            alert('Something Went Wrong');
                        }
                    },
                    error: function (Data) {
                        console.log('Error In Ajax Call ' + Data);
                        alert('Something Went Wrong');
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "./AddNewChallanAjax/getHSNGSTFromSubcategory.php",
                    data: { subcatid: subcatid },
                    dataType: 'json',
                    success: function (Data) {
                        console.log(Data);
                        if (Data[0].FLAG == "OKK") {
                            $("#hsn").val(Data[1].hsnnum);
                            $("#gst").val(Data[1].gstnum);
                        } else if (Data[0].FLAG == "RECORDNOTFOUND") {
                            console.log("No Brands Found For Selected Category And Subcategory");
                            alert("No Brands Found For Selected Category And Subcategory");
                        } else if (Data[0].FLAG == 'ERRORINEXECUTINGQUERY') {
                            console.log("ERROR IN EXECUTING QUERY");
                            alert("Something Went Wrong");
                        } else {
                            console.log('Other Then Flag');
                            alert('Something Went Wrong');
                        }
                    },
                    error: function (Data) {
                        console.log('Error In Ajax Call ' + Data);
                        alert('Something Went Wrong');
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "./AddNewChallanAjax/getGradesFromSubcategory.php",
                    data: { subcatid: subcatid },
                    dataType: 'json',
                    success: function (Data) {
                        console.log(Data);
                        if (Data[0].FLAG == "OKK") {
                            var n = Data.length;

                            for (var i = 1; i < n; i++) {
                                $("#getgrade").append(new Option(Data[i].gradetext, Data[i].gradeid));
                                //$("#selectgrade").append('<option value='+Data[i].gradeid+' showvalue='+Data[i].gradetext+'>'+Data[i].gradetext+'</option>');
                            }
                        }
                        else if (Data[0].FLAG == "RECORDNOTFOUND") {
                            console.log("No Grade Found For Selected Category And Subcategory");
                            alert("No Grade Found For Selected Category And Subcategory");
                        }
                        else if (Data[0].FLAG == 'ERRORINEXECUTINGQUERY') {
                            console.log("ERROR IN EXECUTING QUERY");
                            alert("Something Went Wrong");
                        }
                        else {
                            console.log('Other Then Flag');
                            alert('Something Went Wrong');
                        }
                    },
                    error: function (Data) {
                        console.log('Error In Ajax Call ' + Data);
                        alert('Something Went Wrong');
                    }
                });
            }
            else {
                ReloadGradeSelectMenu();
                ReloadBrandSelectMenu();
            }

        });

        $("#searchbtn").click(function () {
            $("#searchedTable tbody").empty();
            var category = $("#category_name").val();
            var subcategory = $("#subcategories").val();
            var brandname = $("#getbrandname").val();
            var hsncode = $("#hsn").val();
            var grade = $("#getgrade").val();
            var colortype = $("#getProductTypeColor").val();
            var dimension = $("#getdimension").val();
            var qtyperunit = $("#getqtyperunit").val();
            var packingunit = $("#getpackingunit").val();
            var codeno = $("#getcode").val();
            var gstno = $("#gst").val();

            if (category != '-1' && subcategory != '-1' && brandname != '-1' && hsncode != ' ' && grade != '-1' && colortype != '-1' && dimension != '-1' && qtyperunit != '-1' && packingunit != '-1' && codeno != '-1' && gstno != ' ') {
                $.ajax({
                    type: "POST",
                    url: "./BreakageAndDamageAjax/searchProductId.php",
                    data: { category: category, subcategory: subcategory, brandname: brandname, hsncode: hsncode, grade: grade, colortype: colortype, dimension: dimension, qtyperunit: qtyperunit, packingunit: packingunit, codeno: codeno, gstno: gstno },
                    dataType: 'json',
                    success: function (Data) {
                        console.log(Data);
                        if (Data[0].FLAG == "OKK") {
                            $("#pid").val(Data[1].productid);
                            var productid = $("#pid").val();

                            $.ajax({
                                type: "POST",
                                url: "./BreakageAndDamageAjax/searchFromStocks.php",
                                data: { productid: productid },
                                dataType: 'json',
                                success: function (Data) {
                                    console.log(Data);
                                    if (Data[0].FLAG == "RECORDFOUND") {
                                        let n = Data.length;
                                        console.log(Data);

                                        var category1 = 0;
                                        var subcategory1 = 0;
                                        var brandname1 = 0;
                                        var grade1 = 0;
                                        var billingqty1 = 0;
                                        var otherqty1 = 0;
                                        var baseprice1 = 0;
                                        var createddate1 = 0;
                                        var stockid1 = 0;


                                        for (let i = 1; i < n; i++) {
                                            var category = $('#category_name option:selected').html();
                                            var subcategory = $('#subcategories option:selected').html();
                                            var brandname = $('#getbrandname option:selected').html();
                                            var grade = $('#getgrade option:selected').html();
                                            var billingqty = Data[i].billingqty;
                                            var otherqty = Data[i].otherqty;
                                            var baseprice = Data[i].baseprice;
                                            var dateadded = Data[i].dateadded;
                                            var stockid = Data[i].stockid;
                                            stockids = stockid;

                                            category1 = category;
                                            subcategory1 = subcategory;
                                            brandname1 = brandname;
                                            grade1 = grade;
                                            billingqty1 = billingqty;
                                            otherqty1 = otherqty;
                                            baseprice1 = baseprice;
                                            dateadded1 = dateadded;
                                            stockid1 = stockid;
                                            console.log(dateadded);

                                            $("#searchedTable tbody:last-child").append(
                                                '<tr>' +
                                                '<td>' + category + '</td>' +
                                                '<td>' + subcategory + '</td>' +
                                                '<td>' + hsncode + '</td>' +
                                                '<td>' + colortype + '</td>' +
                                                '<td>' + brandname + '</td>' +
                                                '<td>' + dimension + '</td>' +
                                                '<td>' + qtyperunit + '</td>' +
                                                '<td>' + packingunit + '</td>' +
                                                '<td>' + grade + '</td>' +
                                                '<td>' + codeno + '</td>' +
                                                '<td>' + gstno + '</td>' +
                                                '<td>' + billingqty + '</td>' +
                                                '<td>' + otherqty + '</td>' +
                                                '<td>' + baseprice + '</td>' +
                                                '<td>' + dateadded + '</td>' +
                                                '<td><input type="button" class="btn btn-primary selectbtn" pid="' + productid + '" stockid="' + stockid + '"value="Select"></center></td>' +
                                                '</tr>'
                                            );
                                        }
                                    } else if (Data[0].FLAG == "NORECORDFOUND") {
                                        alert('NO Record Found For Your Search Result');
                                    } else if (Data[0].FLAG == "ERRORINQUERY") {
                                        alert('Error In Query');
                                    }
                                },
                                error: function (Data) {
                                    console.log('Error In Ajax Call ' + Data);
                                    alert('Something Went Wrong');
                                }
                            });
                        } else if (Data[0].FLAG == "RECORDNOTFOUND") {
                            console.log("No Such Product Found");
                            alert("No Such Product Found");
                        }
                        else if (Data[0].FLAG == 'ERRORINEXECUTINGQUERY') {
                            console.log("ERROR IN EXECUTING QUERY");
                            alert("Something Went Wrong");
                        }
                        else {
                            console.log('Other Then Flag');
                            alert('Something Went Wrong');
                        }
                    },
                    error: function (Data) {
                        console.log('Error In Ajax Call ' + Data);
                        alert('Something Went Wrong');
                    }
                });
            } else {
                alert('All Fields are Required.');
            }
        });

        $("#searchedTable").on('click', '.selectbtn', function () {
            console.log($(this).attr('stockid'));
            stockid = $(this).attr('stockid');
            //stockids=stockid;

            //console.log(stockids);

            if (!stockIdsToBePurchased.has(stockid)) {
                stockIdsToBePurchased.add(stockid);
                let tr = $(this).parent().siblings();

                let obj = Array();

                for (let i = 0; i < 15; i++) {
                    obj.push(tr.html());
                    tr = tr.next();
                }
                var ids = $(this).attr("stockid");
                console.log(ids);
                var trToBeAppend =
                    '<tr>' +
                    '<td>' + obj[0] + '</td>' +
                    '<td>' + obj[1] + '</td>' +
                    '<td>' + obj[3] + '</td>' +
                    '<td>' + obj[4] + '</td>' +
                    '<td>' + obj[5] + '</td>' +
                    '<td>' + obj[6] + '</td>' +
                    '<td>' + obj[7] + '</td>' +
                    '<td>' + obj[8] + '</td>' +
                    '<td>' + obj[9] + '</td>' +
                    '<td>' + obj[13] + '</td>' +
                    '<td>' + obj[14] + '</td>' +//date
                    '<td>' + obj[11] + '</td>' +
                    '<td>' + obj[12] + '</td>' +
                    //'<td width="7%" ><input class="form-control purchase-qty calprice"  onkeyup="validateQty(this,' + obj[14] + ');  " type="number" step="1" id="date_' + $(this).attr("stockid") + '" >' +
                    '<td width="7%" ><input class="form-control purchase-qty calprice"  onkeyup="validateQty(this,' + obj[11] + ');  " type="number" step="1" id="billingqty_' + $(this).attr("stockid") + '" >' +
                    '<td width="7%" ><input class="form-control purchase-qty calprice"  onkeyup="validateQty(this,' + obj[12] + ');  " type="number" step="1" id="otherqty_' + $(this).attr("stockid") + '" >' +
                    '<td></td>' +

                    //'<td><button value="Remove" class="btn btn-danger removebtn" id="'+ $(this).attr("stockid") +'" onclick="calprice()" >Save</button></td>' +
                    '<td><button value="Remove" class="btn btn-danger" onclick="calprice(this, ' + ids + ')" >Save</button></td>' +
                    '</tr>';

                $("#purchasedTable tbody:last-child").append(trToBeAppend);
            }
            else {
                alert('Item Alredy Present Inside Purchased Items List');
            }
        });

        // $("#purchasedTable").on('click', '.savebtn', function () {
        //     var stockid = $(this).attr('stockid');

        //     if (stockIdsToBePurchased.delete(stockid)) {
        //         var p = $(this).parent().parent().remove();
        //         calprice();
        //     }
        //     else {
        //         console.log('Error in remove')
        //     }
        // });

        function ReloadGradeSelectMenu() {
            ResetSelectMenu($("#getgrade"));
            $.ajax({
                type: "POST",
                url: "./AddNewChallanAjax/getGrades.php",
                dataType: 'json',
                success: function (Data) {
                    if (Data[0].FLAG == 'OKK') {
                        var n = Data.length;
                        for (var i = 1; i < n; i++) {
                            $("#getgrade").append(new Option(Data[i].gradetext, Data[i].gradeid));
                        }
                        //$("#getgrade").prop('disabled', false);
                    }
                    else if (Data[0] == 'ERRORINEXECUTINGQUERY') {
                        console.log("ERROR IN EXECUTING QUERY");
                        alert('Something Went Wrong');
                    }
                    else {
                        console.log('OTHER THEN FLAG');
                        alert('Something Went Wrong');
                    }
                },
                error: function (Data) {
                    console.log(Data);
                    alert('Something Went Wrong');
                }
            });
        }

        function ReloadBrandSelectMenu() {
            ResetSelectMenu($("#getbrandname"));
            $.ajax({
                type: "POST",
                url: "./AddNewChallanAjax/getBrandNames.php",
                dataType: 'json',
                success: function (Data) {
                    if (Data[0].FLAG == 'OKK') {
                        var n = Data.length;
                        for (var i = 1; i < n; i++) {
                            $("#getbrandname").append(new Option(Data[i].brandname, Data[i].brandid));
                        }
                        //$("#getbrandname").prop('disabled', false);
                    }
                    else if (Data[0] == 'ERRORINEXECUTINGQUERY') {
                        console.log("ERROR IN EXECUTING QUERY");
                        alert('Something Went Wrong');
                    }
                    else {
                        console.log('OTHER THEN FLAG');
                        alert('Something Went Wrong');
                    }
                },
                error: function (Data) {
                    console.log(Data);
                    alert('Something Went Wrong');
                }
            });
        }

        function ReloadSubcategoriesSelectMenu() {
            ResetSelectMenu($("#subcategories"));
            $.ajax({
                type: "POST",
                url: "./AddNewChallanAjax/getAllSubCategories.php",
                dataType: 'json',
                success: function (Data) {
                    console.log(Data);
                    if (Data[0].FLAG == 'OK') {
                        let n = Data.length;
                        for (let i = 1; i < n; i++) {
                            scn = Data[i].scn;
                            sci = Data[i].sci;
                            $("#subcategories").append(new Option(scn, sci));
                        }
                    }
                    else if (Data[0].FLAG == "NORECORDFOUND") {
                        console.log("No Subcategory Found For Given Category");
                        alert('No Subcategory Found For Given Category');
                    }
                    else if (Data[0].FLAG == "NOTOK") {
                        console.log("Error In Executing Query");
                        alert("Something Went Wrong");
                    }
                    else {
                        console.log('Other Response Found');
                        alert('Something Went Wrong');
                    }
                },
                error: function (Data) {
                    console.log("Error In ./SearchAndManageProductAjax/getAllSubCategories.php   Ajax Call");
                    console.log(Data.responseText);
                    console.log(Data.statusText);
                }
            });
        }

        function ReloadDimesionSelectMenu() {

            ResetSelectMenu($("#getdimension"));
            $.ajax({
                type: "POST",
                url: "./AddNewChallanAjax/getAllDimesnsions.php",
                dataType: 'json',
                success: function (Data) {
                    console.log(Data);
                    if (Data[0].FLAG == "OKK") {
                        var n = Data.length;

                        for (var i = 1; i < n; i++) {
                            $("#getdimension").append(new Option(Data[i].dimension, Data[i].dimension));
                        }
                    }
                    else if (Data[0].FLAG == "NORECORD") {
                        console.log("No Record Found");
                        alert("No Record Found");
                    }
                    else if (Data[0].FLAG == "ERREXECUTINGQUERY") {
                        console.log('Error In Executing Query');
                        alert("Something Went Wrong");
                    }
                    else {
                        console.log("Other Response FOund");
                        alert('Something Went Wrong');
                    }
                },
                error: function (Data) {
                    console.log("Erroe In ./SearchAndManageProductAjax/getAllDimesnsions.php   AJax Call");
                    alert("Soething Went Wrong");
                }
            });
        }

        function ReloadQtyPerUnitSelectMenu() {
            ResetSelectMenu($("#getqtyperunit"));

            $.ajax({
                type: "POST",
                url: "./AddNewChallanAjax/getQtyPerUnit.php",
                dataType: 'json',
                success: function (Data) {
                    console.log(Data);
                    if (Data[0].FLAG == "OKK") {
                        var n = Data.length;

                        for (var i = 1; i < n; i++) {
                            $("#getqtyperunit").append(new Option(Data[i].qtyperunit, Data[i].qtyperunit));
                        }
                    }
                    else if (Data[0].FLAG == "NORECORD") {
                        console.log("No Record Found");
                        alert("No Record Found");
                    }
                    else if (Data[0].FLAG == "ERREXECUTINGQUERY") {
                        console.log('Error In Executing Query');
                        alert("Something Went Wrong");
                    }
                    else {
                        console.log("Other Response FOund");
                        alert('Something Went Wrong');
                    }
                },
                error: function (Data) {
                    console.log("Erroe In ./SearchAndManageProductAjax/getAllDimesnsions.php   AJax Call");
                    alert("Soething Went Wrong");
                }
            });
        }

        function ReloadProductTypeColorMenu() {
            //function getProductTypeColor(){
            ResetSelectMenu($("#getProductTypeColor"));
            $.ajax({
                type: "POST",
                url: "./AddNewChallanAjax/getProductTypeColor.php",
                dataType: 'json',
                success: function (Data) {
                    console.log(Data);
                    if (Data[0].FLAG == "OKK") {
                        var n = Data.length;
                        for (var i = 1; i < n; i++) {
                            $("#getProductTypeColor").append(new Option(Data[i].producttypecolor, Data[i].producttypecolor));
                        }
                    }
                    else if (Data[0].FLAG == "NORECORD") {
                        console.log("No Record Found");
                        alert("No Record Found");
                    }
                    else if (Data[0].FLAG == "ERREXECUTINGQUERY") {
                        console.log('Error In Executing Query');
                        alert("Something Went Wrong");
                    }
                    else {
                        console.log("Other Response FOund");
                        alert('Something Went Wrong');
                    }
                },
                error: function (Data) {
                    console.log("Erroe In  ./SearchAndManageProductAjax/getProductTypeColor.php AJax Call");
                    alert("Soething Went Wrong");
                }
            });
        }

        function ReloadCodeSelectMenu() {
            ResetSelectMenu($("#getcode"));

            $.ajax({
                type: "POST",
                url: "./AddNewChallanAjax/getCode.php",
                dataType: 'json',
                success: function (Data) {
                    console.log(Data);
                    if (Data[0].FLAG == "OKK") {
                        var n = Data.length;

                        for (var i = 1; i < n; i++) {
                            $("#getcode").append(new Option(Data[i].code, Data[i].code));
                        }
                    }
                    else if (Data[0].FLAG == "NORECORD") {
                        console.log("No Record Found");
                        alert("No Record Found");
                    }
                    else if (Data[0].FLAG == "ERREXECUTINGQUERY") {
                        console.log('Error In Executing Query');
                        alert("Something Went Wrong");
                    }
                    else {
                        console.log("Other Response FOund");
                        alert('Something Went Wrong');
                    }
                },
                error: function (Data) {
                    console.log("Error In  ./SearchAndManageProductAjax/getCode.php AJax Call");
                    alert("Something Went Wrong");
                }
            });
        }

        function ResetSelectMenu(sm) {
            sm.empty();
            sm.append(new Option("Select", "-1"));
        }

    });

    function validateQty(obj, maxqty) {
        var qty = obj.value;

        dotqty = qty - Math.trunc(qty)
        if (dotqty <= 0) {
            if (qty > maxqty) {
                alert('Max Stock Qty = ' + maxqty);
                obj.value = "";
            }
            else if (qty < 0) {
                alert('Quantity Cant Be Minus');
                obj.value = "";
            }
        }
        else {
            alert("Qty Cant Be Float");
            obj.value = "";
        }
    }


    function calprice(ref, stockid) {
        var billingQty = $("#billingqty_" + stockid).val();
        var otherQty = $("#otherqty_" + stockid).val();

        console.log(billingQty);
        console.log(otherQty);

        if (billingQty == "") {
            swal("Billing Qty Empty", '', 'info').then(() => {
                return;
            });
            return;
        }

        if (otherQty == "") {
            swal("Other Qty Empty", '', 'info').then(() => {
                return;
            });
            return;
        }
        

        if (stockid != "") {
            $.ajax({
                type: 'POST',
                url: './BreakageAndDamageAjax/addBreakageAndDamage.php',
                data: { stockid: stockid, billingqty: billingQty, otherqty: otherQty },
                success: function (Data) {
                    if (Data == '1') {
                        swal("Succesfully Added Items To Damaged Stocks", '', 'success').then(() => {
                            var k = stockIdsToBePurchased.delete(stockid.toString());
                            var p = ref.parentNode.parentNode.remove();
                            $("#searchbtn").click();
                        });
                    }
                    else if (Data == '-1') {
                        swal("Something Went Wrong", '', 'error').then(() => {
                            return;
                        });
                        return;
                    }
                    else {
                        console.log("Otherb Flag Recived");
                        swal("Something Went Wrong", '', 'error');
                    }
                }
            });
        }
        else {
            console.log("Error In Getting Stockid");
            swal("Something Went Wrong", '', 'error').then(() => {
                return;
            });
            return;
        }
        // var totalprice = 0,stocksid=0;
        // console.log(y);
        // totalprice=billingQty;

        // var val1 = totalprice;
        // var val2 = otherQty;
        // var val3 = y;
        // console.log(val2);

        //     $.ajax({
        //         type: 'POST',
        //         url: './AddNewChallanAjax/updatestockdetails.php',
        //         data: { val1: val1, val2: val2, val3:val3 },
        //         success: function() {
        //             alert('Data added successfully');
        //         }
        //     });    
    }

</script>