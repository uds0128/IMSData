<?php
    include('./config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ManageSubCategories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <style>
        .old-category:disabled {
            background-color: lightslategrey;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;

        }

        th {
            text-align: center;
        }

        td {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container-fluid col-lg-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #2B60DE">
                        <h3 class="card-title" style="color: white" align="center">Manage Sub Categories</h3>
                    </div>
                    <div class="card-body" style="background-color: #8da9bd;">
                        <div class='row'>
                            <div class="col-md-2 mt-1">
                                <label class='form-label' for="categories_name">Categories :</label>
                            </div>
                            <div class="col-md-4">
                                <select class='form-control form-select' name="categories_name" id="categories_name">
                                    <option value="-1">Select</option>
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
                                                "<option value=".$category_id.">".$category_name."</option>";
                                            }
                                        }
                                        else
                                        {
                                            echo "<script>alert('Something Went Wrong');</script>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-2"></div>
                            <div class="col-md-4 row">
                                <div class="col-md-1">
                                    <input class='form-check-input' id='addcheck' type="checkbox">
                                </div>
                                <div class="col-md-11">
                                    <label for="">Add New Sub Category</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-2 mt-1">
                                <label class='form-label' for="SubCategoryLabel">Sub Category :</label>
                            </div>
                            <div class="col-md-4">
                                <input class='form-control' id='getSubCategoryName' type="text" disabled>
                                <input class='form-control' id='getSubCategoryId' type="text" disabled hidden>
                            </div>
                            <div class="col-md-2">
                                <center><label class='form-label' id='OldSubCategoryLabel' for="OldSubCategoryLabel"
                                        hidden>Old
                                        Sub Category :</label></center>
                            </div>
                            <div class="col-md-4">
                                <input class='form-control' id='getOldSubCategoryName' type="text" hidden disabled>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-2 mt-1">
                                <label class='form-label' for="HSNCodeLabel">HSN Code :</label>
                            </div>
                            <div class="col-md-4">
                                <input class='form-control' id='getHSNCode' type="number"
                                    onKeyPress="if(this.value.length==8) return false;" disabled>
                                <!-- <input class='form-control' id='getSubCategoryId' type="text" disabled hidden>  -->
                            </div>
                            <div class="col-md-2">
                                <center><label class='form-label' id='OldHSNCodeLabel' for="OldHSNCodeLabel" hidden>Old
                                        HSN Code
                                        :</label></center>
                            </div>
                            <div class="col-md-4">
                                <input class='form-control' id='OldHSNCode' type="number" hidden disabled>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-2 mt-1">
                                <label class='form-label' for="GSTLabel">GST :</label>
                            </div>
                            <div class="col-md-4">
                                <!-- <input class='form-control' id='getGST' type="number"
                                    onKeyPress="if(this.value.length==8) return false;" disabled> -->
                                <!-- <input class='form-control' id='getSubCategoryId' type="text" disabled hidden>  -->
                                <select name="" id="selectgst" class='form-select' disabled>
                                    <option value="-1">Select</option>
                                    <option value="5">5</option>
                                    <option value="12">12</option>
                                    <option value="18">18</option>
                                    <option value="28">28</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <center><label class='form-label' id='OldGstLabel' for="OldGst" hidden>Old
                                        GST
                                        :</label></center>
                            </div>
                            <div class="col-md-4">
                                <input class='form-control' id='OldGst' type="number" hidden disabled>
                            </div>
                        </div>


                        <!-- <div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class='form-label' for="CategoryName">Category Name : </label>
                                </div>
                                <div class="col-md-4">
                                    <input class='form-control' type="text" id='CategoryName'>
                                </div>
                                <div class="col-md-2">
                                    <label class='form-label' for="OldCategoryName" id='OldCategoryLabel' hidden>Old
                                        Category Name : </label>
                                </div>
                                <div class="col-md-4">
                                    <input class='form-control old-category' type="text" id='OldCategoryName' disabled
                                        hidden>
                                    <input type="text" id='OldCategoryId' value='' disabled hidden>
                                </div>
                            </div> -->
                        <button id='addbtn' class='btn btn-primary mt-3' disabled>Add</button>
                        <button id='savebtn' class='btn btn-primary mt-3' disabled>Save</button>
                        <button id='cancelbtn' class='btn btn-primary mt-3' disabled>Cancel</button>
                        <button id='loadbtn' class='btn btn-primary mt-3'>Load</button>


                        <table class="table" id="data_table">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Categories</th>
                                    <th>HSN Code</th>
                                    <th>GST</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody id='tblbody'>
                                <!-- <?php
                                    $query = "SELECT * from categories";
                                    $result = mysqli_query($conn, $query);
                                    if($result->num_rows > 0)
                                    {
                                        while($row = $result->fetch_assoc())
                                        {
                                            $category_no = $row['category_id'];
                                            $category = $row['category_name'];
                                            $active_status = $row['active_status'];
                                            $color;
                                            $btnname;
                                            if($active_status == '1')
                                            {
                                                $color = 'success';
                                                $btnname = 'Deactive';
                                            }
                                            else
                                            {
                                                $color = 'danger';
                                                $btnname = 'Active';
                                            }
                                            echo
                                            "<tr>
                                                <td>".$category_no."</td>
                                                <td>".$category."</td>
                                                <td>
                                                    <button class='btn btn-success btn-edit' cid=".$category_no.">Edit</button>
                                                    <button class='btn btn-".$color." btn-active' cid=".$category_no." as=".$active_status.">".$btnname."</button>
                                                </td>
                                            </tr>";
                                        }
                                    }
                                    else
                                    {
                                        echo "<script> alert('Something Went Wrong ! Please Refresh')</script>";
                                    }
                                ?> -->
                            </tbody>
                        </table>
                        <!-- </form>    -->

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        let editflag = false;

        $(document).ready(function () {

            $("tbody").on('click', '.btn-active', function () {
                let id = $(this).attr("scid");
                let as = $(this).attr("as");
                let t = $(this);
                console.log(as);
                console.log(id);

                if (id != '' && as != '') {
                    let myobj = { cid: id, as: as };
                    $.ajax({
                        type: "POST",
                        url: './ManageSubCategoryAjax/changeActiveStatusSubCategory.php',
                        data: JSON.stringify(myobj),
                        success: function (Data) {

                            console.log('HELLO');
                            if (as == '1' && Data == '1') {

                                console.log('HELLO2');
                                t.attr("as", '0');
                                t.removeClass('btn-success');
                                t.addClass('btn-danger');
                                t.html('Active');
                            }
                            else if (as == '1' && Data == '0') {
                                console.log('HELLO3');
                                alert('Status Not Changed');
                            }
                            else if (as == '0' && Data == '1') {
                                console.log('HELLO4');
                                t.attr("as", '1');
                                t.removeClass('btn-danger');
                                t.addClass('btn-success');
                                t.html('Deactive');
                            }
                            else {
                                console.log('HELLO5');
                                alert('Status Not Changed');
                            }
                        }
                    });
                }
            });

            $("tbody").on('click', '.btn-edit', function () {
                editflag = true;
                let id = $(this).attr("scid");
                let t = $(this);
                $("#categories_name").prop('disabled', true);
                console.log(id);
                if (id != '') {
                    let myobj = { scid: id };
                    $.ajax({
                        type: "POST",
                        url: './ManageSubCategoryAjax/editSubCategoryfetchData.php',
                        data: JSON.stringify(myobj),
                        dataType: 'json',
                        success: function (Data) {
                            console.log(Data);

                            if (Data[0].FLAG == "RECORDFOUND") {

                                $('#getSubCategoryId').val(id);
                                $("#getSubCategoryName").val(Data[1].subcategory_name);
                                $("#getOldSubCategoryName").val(Data[1].subcategory_name);
                                $("#getHSNCode").val(Data[1].hsncode);
                                $("#OldHSNCode").val(Data[1].hsncode);
                                $("#getSubCategoryName").attr('disabled', false);
                                $("#getHSNCode").attr('disabled', false);
                                $("#OldSubCategoryLabel").attr('hidden', false);
                                $("#getOldSubCategoryName").attr('hidden', false);
                                $("#OldHSNCodeLabel").attr('hidden', false);
                                $("#OldHSNCode").attr('hidden', false);
                                $("#selectgst").prop('disabled', false);
                                $("#selectgst").val(Data[1].gst);
                                $("#OldGstLabel").prop('hidden', false);
                                $("#OldGst").prop('hidden', false);
                                $("#OldGst").val(Data[1].gst);


                                $("#addbtn").attr('disabled', true);
                                $("#savebtn").attr('disabled', false);
                                $("#loadbtn").attr('disabled', true);
                                $("#cancelbtn").attr('disabled', false);
                            }
                            else if (Data[0].FLAG == "ERROR") {
                                console.log("ERROR IN EXECUTING ERROR");
                                alert("Something Went Wrong");
                            }
                        }
                    });
                }
            });

            $('#savebtn').on('click', function () {

                let id = $('#getSubCategoryId').val();
                let subcategory_name = $('#getSubCategoryName').val();
                let hsncode = $("#getHSNCode").val();
                let gst = $("#selectgst").val();
                console.log(hsncode);

                let myobj = { scid: id, scname: subcategory_name, hsncode: hsncode, gst: gst };
                console.log(myobj);
                if (subcategory_name != '' && scid != '' && hsncode != '' && gst != '') {
                    $.ajax({
                        type: "POST",
                        url: './ManageSubCategoryAjax/editSubCategory.php',
                        data: JSON.stringify(myobj),
                        success: function (Data) {
                            console.log(Data);
                            if (Data == "OKK") {
                                $('#getSubCategoryId').val('');

                                $("#getSubCategoryName").val('');
                                $("#getSubCategoryName").prop('disabled', true);
                                $("#getOldSubCategoryName").val('');
                                $("#OldSubCategoryLabel").attr('hidden', true);
                                $("#getOldSubCategoryName").attr('hidden', true);
                                $("#getHSNCode").val('');
                                $("#getHSNCode").prop('disabled', true);
                                $("#OldHSNCodeLabel").attr('hidden', true);
                                $("#OldHSNCode").attr('hidden', true);

                                $("#addcheck").prop("checked", false);

                                //$("#getOldSubCategoryName").val('');
                                $("#addbtn").attr('disabled', true);
                                $("#savebtn").attr('disabled', true);
                                $("#cancelbtn").attr('disabled', true);
                                $("#loadbtn").attr('disabled', false);
                                editflag = false;
                                $("#categories_name").prop('disabled', false);
                                $("#OldGstLabel").prop('hidden', true);
                                $("#OldGst").prop('hidden', true);
                                $("#OldGst").val("");
                                $("#selectgst").val('-1');
                                $("#selectgst").prop('disabled', true);


                                //location.reload(true);
                                ReloadTable();
                            }
                            else if (Data == "RECORDFOUND") {
                                console.log('RECORD FOUND');
                                alert("Something Went Wrong");
                            }
                            else if (Data == "COMMITFAIL") {
                                console.log('Commit Fail');
                                alert("Something Went Wrong");
                            }
                            else if (Data == "MORERECORD") {
                                console.log('More Then One Record Found');
                                alert("Something Went Wrong");
                            }
                            else if (Data == "ERRINCHEACKING") {
                                console.log('Error In Cheacking');
                                alert("Something Went Wrong");

                            }
                            else if (Data == "PARAMEMPTY") {
                                console.log("Parameters Empty");
                                alert("Something Went Wrong");
                            }
                            else if (Data == "ERRORINUPDATING") {
                                console.log("ERROR WHILE UPDATING");
                                alert("Something Went Wrong");
                            }
                            else {
                                console.log("Other Then Flag");
                                alert("Something Went Wrong");
                            }
                        },
                        error: function (Data) {
                            console.log('Error In edit dubcategory Ajax Call');
                            alert('Something Went Wrong');
                        }
                    });

                }
                else {
                    alert('Please Fill All The Field');
                    location.reload(true);
                }
            });

            $('#addbtn').on('click', function () {
                let category_id = $('#categories_name').val();
                let subcategory_name = $('#getSubCategoryName').val();
                let hsncode = $('#getHSNCode').val();
                let gst = $('#selectgst').val();
                console.log("KKKKKK");
                console.log(gst);
                console.log("DDDDDDDDDD");

                if (subcategory_name != '' && category_id != '-1' && hsncode != '' && gst != "-1") {
                    myobj = { scname: subcategory_name, cid: category_id, hsncode: hsncode, gst: gst };
                    $.ajax({
                        type: "POST",
                        url: './ManageSubCategoryAjax/addSubCategory.php',
                        data: JSON.stringify(myobj),
                        success: function (Data) {
                            console.log(Data);
                            if (Data == "OKK") {
                                $('#getSubCategoryId').val('');

                                $("#getSubCategoryName").val('');
                                $("#getSubCategoryName").prop('disabled', true);
                                $("#getOldSubCategoryName").val('');
                                $("#OldSubCategoryLabel").attr('hidden', true);
                                $("#getOldSubCategoryName").attr('hidden', true);
                                $("#getHSNCode").val('');
                                $("#getHSNCode").prop('disabled', true);
                                $("#OldHSNCodeLabel").attr('hidden', true);
                                $("#OldHSNCode").attr('hidden', true);

                                $("#addcheck").prop("checked", false);

                                //$("#getOldSubCategoryName").val('');
                                $("#addbtn").attr('disabled', true);
                                $("#savebtn").attr('disabled', true);
                                $("#cancelbtn").attr('disabled', true);
                                $("#loadbtn").attr('disabled', false);
                                editflag = false;
                                $("#categories_name").prop('disabled', false);
                                $("#OldGstLabel").prop('hidden', true);
                                $("#OldGst").prop('hidden', true);
                                $("#OldGst").val("");
                                $("#selectgst").val('-1');
                                $("#selectgst").prop('disabled', true);


                                //location.reload(true);
                                ReloadTable();
                            }
                            else if (Data == "RECORDFOUND") {
                                console.log('RECORD FOUND');
                                alert("Something Went Wrong");
                            }
                            else if (Data == "COMMITFAIL") {
                                console.log('Commit Fail');
                                alert("Something Went Wrong");
                            }
                            else if (Data == "MORERECORD") {
                                console.log('More Then One Record Found');
                                alert("Something Went Wrong");
                            }
                            else if (Data == "ERRINCHEACKING") {
                                console.log('Error In Cheacking');
                                alert("Something Went Wrong");

                            }
                            else if (Data == "PARAMEMPTY") {
                                console.log("Parameters Empty");
                                alert("Something Went Wrong");
                            }
                            else if (Data == "ERRORINUPDATING") {
                                console.log("ERROR WHILE UPDATING");
                                alert("Something Went Wrong");
                            }
                            else {
                                console.log("Other Then Flag");
                                alert("Something Went Wrong");
                            }
                            /*if (Data) {

                                //location.reload(true);
                                $('#getSubCategoryId').val('');

                                $("#getSubCategoryName").val('');
                                $("#getSubCategoryName").prop('disabled', true);
                                $("#getHSNCode").val('');
                                $("#getHSNCode").prop('disabled', true);
                                $("#getOldSubCategoryName").val('');
                                $("#OldSubCategoryLabel").attr('hidden', true);
                                $("#getOldSubCategoryName").attr('hidden', true);

                                $("#getHSNCode").val('');
                                $("#OldHSNCodeLabel").attr('hidden', true);
                                $("#OldHSNCode").attr('hidden', true);

                                $("#addcheck").prop("checked", false);

                                //$("#getOldSubCategoryName").val('');
                                $("#addbtn").attr('disabled', true);
                                $("#savebtn").attr('disabled', true);
                                $("#cancelbtn").attr('disabled', true);
                                $("#loadbtn").attr('disabled', false);
                                editflag = false;
                                $("#categories_name").prop('disabled', false);
                                $("#selectgst").val("-1");
                                $("#selectgst").prop('disabled', true);
                                ReloadTable();
                            }
                            else {
                                alert('Some Thing Went Wrong');
                            }*/
                        }
                    });
                }
                else {
                    alert('Please Fill All The Fields || Select Category');
                }
            });

            $("#loadbtn").on('click', function () {
                let sel_id = $("#categories_name").val();

                if (sel_id != '-1') {
                    myobj = { cid: sel_id };
                    console.log(myobj);
                    console.log(JSON.stringify(myobj));
                    $.ajax({
                        type: "POST",
                        url: './ManageSubCategoryAjax/getSubCategories.php',
                        data: JSON.stringify(myobj),
                        dataType: "json",
                        success: function (Data) {
                            //console.log("KIJJJ");
                            console.log(Data);

                            //console.log(JSON.stringify(Data));
                            if (Data[0].FLAG == "OK") {
                                var x = Data;
                                var appendInTable;
                                var sci;
                                var scn;
                                var as;
                                var color;
                                var btntext;
                                var hsncode;
                                for (var i = 1; i < x.length; i++) {
                                    scid = Data[i].sci;
                                    scn = Data[i].scn;
                                    as = Data[i].as;
                                    hsncode = Data[i].hsncode;
                                    gst = Data[i].gst;
                                    if (as == 1) {
                                        color = 'success';
                                        btntext = 'Deactive';
                                    }
                                    else {
                                        color = 'danger';
                                        btntext = 'Active';
                                    }

                                    appendInTable +=
                                        "<tr>" +
                                        "<td>" + i + "</td>" +
                                        "<td>" + scn + "</td>" +
                                        "<td>" + hsncode + "</td>" +
                                        "<td>" + gst + "</td>" +
                                        "<td>" +
                                        "<button class='btn btn-success btn-edit' scid=" + scid + " as=" + as + ">Edit</button> " +
                                        " <button class='btn btn-primary btn-" + color + " btn-active' scid=" + scid + " as=" + as + ">" + btntext + "</button>" +
                                        "</td>" +
                                        "</tr>";
                                    $("#tblbody").html(appendInTable);
                                }
                            }
                            else {
                                alert("Challan Id Not Found");
                            }
                            //console.log(Data);
                        }
                    });
                }
                else {
                    alert('Please Select Category');
                }

            });

            $("#categories_name").on('change', function () {
                $("#tblbody").empty();
            });

            $("#addcheck").on('change', function () {


                if (editflag == 0) {

                    if ($("#categories_name").val() != "-1") {
                        if ($("#addcheck").prop("checked") == true) {

                            $("#categories_name").prop('disabled', true);

                            $("#getSubCategoryName").attr('disabled', false);
                            $("#getHSNCode").attr('disabled', false);

                            $('#loadbtn').attr('disabled', true);
                            $('#savebtn').attr('disabled', true);
                            $('#addbtn').attr('disabled', false);
                            $('#cancelbtn').attr('disabled', false);
                            $('#selectgst').prop('disabled', false);
                        }
                        else {
                            $('#getSubCategoryId').val('');

                            $("#getSubCategoryName").val('');
                            $("#getOldSubCategoryName").val('');
                            $("#OldSubCategoryLabel").attr('hidden', true);
                            $("#getOldSubCategoryName").attr('hidden', true);
                            $("#getHSNCode").val('');
                            $("#getHSNCode").prop('disabled', true);
                            $("#getHSNCode").val('');
                            $("#OldHSNCodeLabel").attr('hidden', true);
                            $("#OldHSNCode").attr('hidden', true);

                            $("#addcheck").prop("checked", false);

                            //$("#getOldSubCategoryName").val('');
                            $("#addbtn").attr('disabled', true);
                            $("#savebtn").attr('disabled', true);
                            $("#cancelbtn").attr('disabled', true);
                            $("#loadbtn").attr('disabled', false);
                            editflag = false;
                            $('#selectgst').prop('disabled', true);
                        }
                    }
                    else {
                        alert('Please Select Category');
                        $("#addcheck").prop('checked', false);
                    }

                }
                else {
                    alert("IN EDIT MODE");
                    $("#addcheck").prop('checked', false);
                }
            });

            $("#cancelbtn").click(function () {
                //location.reload(true);
                let id = null;
                let t = null;;
                console.log(id);
                if (id != undefined) {
                }
                else {
                    editflag = false;
                    $("#addcheck").prop('checked', false);

                    $('#getSubCategoryId').val('');
                    $("#getSubCategoryName").val('');
                    $("#getOldSubCategoryName").val('');
                    $("#getHSNCode").val('');
                    $("#OldHSNCode").val('');
                    $("#getSubCategoryName").attr('disabled', true);
                    $("#getHSNCode").attr('disabled', true);
                    $("#OldSubCategoryLabel").attr('hidden', true);
                    $("#getOldSubCategoryName").attr('hidden', true);
                    $("#OldHSNCodeLabel").attr('hidden', true);
                    $("#OldHSNCode").attr('hidden', true);
                    $("#categories_name").prop('disabled', false);
                    $("#categories_name").prop('disabled', false);
                    $("#OldGstLabel").prop('hidden', true);
                    $("#OldGst").prop('hidden', true);
                    $("#OldGst").val("");
                    $("#selectgst").val('-1');
                    $("#selectgst").prop('disabled', true);

                    $("#addbtn").attr('disabled', true);
                    $("#savebtn").attr('disabled', true);
                    $("#loadbtn").attr('disabled', false);
                    $("#cancelbtn").attr('disabled', true);
                }
            });

        });

        function ReloadTable() {

            $("#tblbody").empty();
            let sel_id = $("#categories_name").val();

            if (sel_id != '-1') {
                myobj = { cid: sel_id };
                console.log(myobj);
                console.log(JSON.stringify(myobj));
                $.ajax({
                    type: "POST",
                    url: './ManageSubCategoryAjax/getSubCategories.php',
                    data: JSON.stringify(myobj),
                    dataType: "json",
                    success: function (Data) {
                        //console.log("KIJJJ");
                        console.log(Data);

                        //console.log(JSON.stringify(Data));
                        if (Data[0].FLAG == "OK") {
                            var x = Data;
                            var appendInTable;
                            var sci;
                            var scn;
                            var as;
                            var color;
                            var btntext;
                            var gst;
                            for (var i = 1; i < x.length; i++) {
                                scid = Data[i].sci;
                                scn = Data[i].scn;
                                as = Data[i].as;
                                gst = Data[i].gst;
                                hsncode = Data[i].hsncode;
                                if (as == 1) {
                                    color = 'success';
                                    btntext = 'Deactive';
                                }
                                else {
                                    color = 'danger';
                                    btntext = 'Active';
                                }

                                appendInTable +=
                                    "<tr>" +
                                    "<td>" + i + "</td>" +
                                    "<td>" + scn + "</td>" +
                                    "<td>" + hsncode + "</td>" +
                                    "<td>" + gst + "</td>" +
                                    "<td>" +
                                    "<button class='btn btn-success btn-edit' scid=" + scid + " as=" + as + ">Edit</button>  " +
                                    "<button class='btn btn-primary btn-" + color + " btn-active' scid=" + scid + " as=" + as + ">" + btntext + "</button>" +
                                    "</td>" +
                                    "</tr>";
                                $("#tblbody").html(appendInTable);
                            }
                        }
                        else {
                            alert("Challan Id Not Found");
                        }
                        //console.log(Data);
                    }
                });
            }
            else {
                alert('Please Select Category');
            }

        }

    </script>
</body>

</html>