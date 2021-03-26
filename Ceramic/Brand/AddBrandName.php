<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Brand Name</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                    <div class="card card-header" style="background-color: #2B60DE">
                        <h3 class="card-title" style="color: white" align="center">Manage Brand Name</h3>
                    </div>
                    <div class="card card-body" style="background-color: #8da9bd;">

                        <div class="row mt-4">
                            <div class="col-md-2">
                                <label class="mt-1" for="">Brand Names : </label>
                            </div>
                            <div class="col-md-6">
                                <select name="" id="selectbrandname" class="form-select" disabled>
                                    <option value="-1">Select</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-2">
                                <label class="mt-1" for="">Brand Name : </label>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input class='form-check-input mt-2' type="checkbox" id='addCheckbox'>
                                    </div>
                                    <div class="col-md-11">
                                        <input id='getBrandName' type="text" brandid="" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row mt-4">
                            <div class="col-md-6">
                                <button class='btn btn-primary' id='searchbtn'>Search</button>
                                <button class='btn btn-primary' id='addbtn' disabled>Add</button>
                                <button class='btn btn-primary' id="savebtn" disabled>Save</button>
                                <button class='btn btn-primary' id='cancelbtn' disabled>Cancel</button>
                            </div>
                        </div>



                        <table class="mt-4" id='brandnametbl' hidden>
                            <thead>
                                <tr>
                                    <th width="5%">BrandId</th>
                                    <th>Brand Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="mt-4">
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>

    $(document).ready(function () {

        ReloadOptions();

    });

    $("#searchbtn").click(function () {

        $("#brandnametbl tbody").empty();

        if ($("#selectbrandname").val() != "-1") {

            //$("#selectbrandname").append(new Option("Select", "-1"));

            var brandid = $("#selectbrandname").val();
            console.log(brandid);

            $.ajax({
                type: "POST",
                url: "./AddNewBrandNameAjax/searchBrandName.php",
                data: { brandid: brandid },
                dataType: 'json',
                success: function (Data) {

                    if (Data[0].FLAG == 'OKK') {
                        var n = Data.length;
                        var btntext = "";
                        for (var i = 1; i < n; i++) {

                            if (Data[i].recstatus == 1) {
                                btntext = "Deactive";
                                btncolor = "danger";
                            }
                            else {
                                btntext = "Active";
                                btncolor = "success";
                            }

                            $("#brandnametbl tbody:last-child").append(
                                '<tr>' +
                                '<td>' + Data[i].brandid + '</td>' +
                                '<td>' + Data[i].brandname + '</td>' +
                                '<td> <button class="btn btn-primary editbtn" brandid="' + Data[i].brandid + '" brandname="' + Data[i].brandname + '"> Edit </button> ' +
                                '<button class="btn btn-' + btncolor + ' activestatusbtn" brandid="' + Data[i].brandid + '" brandname="' + Data[i].brandname + '"> ' + btntext + '</button>' +
                                '</td>' +
                                '</tr>'
                            );
                        }

                        $("#brandnametbl").prop('hidden', false);
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
        else {
            alert('Please Select Company Name');
        }

    });

    $('#brandnametbl tbody').on('click', '.editbtn', function () {


        $('#addbtn').prop('disabled', true);
        $('#searchbtn').prop('disabled', true);
        $('#savebtn').prop('disabled', false);
        $('#cancelbtn').prop('disabled', false);
        var brandid = $(this).attr('brandid');
        var brandname = $(this).attr('brandname');

        //console.log(brandid);
        //console.log(brandname);
        $("#getBrandName").attr('brandid', brandid);
        $("#getBrandName").val(brandname);

        $("#getBrandName").prop('disabled', false);
        $("#selectbrandname").val("-1");
        $("#selectbrandname").prop('disabled', true);
        $("#searchbtn").prop('disabled', true);
        $("#addCheckbox").prop('disabled', true);


    });

    $("#savebtn").on('click', function () {
        $("#addCheckbox").prop('disabled', false);
        //$("#getBrandName").attr('brandid', brandid);
        // $("#getBrandName").val("");
        //$("#getBrandName").prop('disabled', true);
        var brandid = $("#getBrandName").attr('brandid');
        console.log(brandid);
        var brandname = $("#getBrandName").val();
        brandname = brandname.toUpperCase();
        console.log(brandname);

        if ($("#getBrandName").val() != "" && brandid != "") {
            $.ajax({
                type: 'POST',
                url: './AddNewBrandNameAjax/updateBrandName.php',
                data: { brandname: brandname, brandid: brandid },
                success: function (Data) {
                    console.log(Data);
                    if (Data == "1") {
                        //alert("Brand Name : " + brandname + " Inserted Successfully");
                        $("#getBrandName").val("");
                        alert("Brand Name Updated Succesfully");
                        ReloadOptions();
                        $("#getBrandName").prop('disabled', true);
                        $("#addCheckbox").prop('disabled', false);

                    }
                    else if (Data == "-4") {
                        alert("Brand Name Already Exists");
                        $("#getBrandName").val("");
                    }
                    else if (Data == "-1") {
                        console.log("Error In Executing Insert Query");
                        alert('Something Went Wrong');
                    }
                    else if (Data == "-2") {
                        console.log(" Error In Commit");
                        alert('Something Went Wrong');
                    }
                    else if (Data == "-3") {
                        console.log("Error In Checking Record");
                        alert('Something Went Wrong');

                    }
                    else if (Data == "-5") {
                        console.log("More then one Row FOund");
                        alert('Something Went Wrong');
                    }
                    else {
                        console.log("Other Flag Error");
                        alert('Something Went Wrong');
                    }
                },
                error: function (Data) {
                    console.log("Error In Update Brand Name Ajax Call");
                    alert('Something Went Wrong');
                }
            });
        }
        else {
            //alert('Please Fill Brand Name');
            swal("Empty", "Please Fill Brand Name", "info");
        }

        Refresh();

    });

    $("#addbtn").click(function () {
        var brandname = $("#getBrandName").val();
        brandname = brandname.toUpperCase();
        //brandname.toUppercase();
        console.log(brandname);

        if (brandname != "") {
            $.ajax({
                type: "POST",
                url: "./AddNewBrandNameAjax/insertBrandNamesIntoDatabase.php",
                data: { brandname: brandname },
                success: function (Data) {
                    console.log(Data);
                    if (Data == "1") {
                        alert("Brand Name : " + brandname + " Inserted Successfully");
                        $("#getBrandName").val("");
                        ReloadOptions();
                    }
                    else if (Data == "-4") {
                        alert("Brand Already Exists");
                        $("#getBrandName").val("");
                    }
                    else if (Data == "-1") {
                        console.log("Error In Executing Insert Query");
                        alert('Something Went Wrong');
                    }
                    else if (Data == "-2") {
                        console.log(" Error In Commit");
                        alert('Something Went Wrong');
                    }
                    else if (Data == "-3") {
                        console.log("Error In Checking Record");
                        alert('Something Went Wrong');

                    }
                    else if (Data == "-5") {
                        console.log("More then one Row FOund");
                        alert('Something Went Wrong');

                    }
                    else {
                        console.log("Other Flag Error");
                        alert('Something Went Wrong');
                    }
                },
                error: function (Data) {
                    console.log(Data);
                    alert('Something Went Wrong');
                }
            });
        }
        else {
            alert('Please Fill Brand Name');
        }

        Refresh();
    });

    $("#addCheckbox").on('change', function () {

        if ($("#addCheckbox").prop('checked') == true) {
            $("#getBrandName").prop('disabled', false);
            $("#selectbrandname").val("-1");
            $("#selectbrandname").prop('disabled', true);
            $("#searchbtn").prop('disabled', true);
            $("#addbtn").prop('disabled', false);
            $("#brandnametbl tbody").empty();
            $("#brandnametbl").prop('hidden', true);

        }
        else {
            //$("#addCheckbox").prop('checked', false);
            $("#getBrandName").prop('disabled', true);
            $("#getBrandName").val("");
            $("#selectbrandname").prop('disabled', false);
            $("#selectbrandname").val("-1");
            $("#searchbtn").prop('disabled', false);
            $("#addbtn").prop('disabled', true);



        }
    });

    $('#cancelbtn').on('click', function () {
        Refresh();
    });

    function ReloadOptions() {

        $("#selectbrandname").empty();
        $("#selectbrandname").append(new Option("Select", "-1"));

        $.ajax({
            type: "POST",
            url: "./AddNewBrandNameAjax/getBrandNames.php",
            dataType: "json",
            success: function (Data) {
                if (Data[0].FLAG == 'OKK') {
                    var n = Data.length;
                    for (var i = 1; i < n; i++) {
                        $("#selectbrandname").append(new Option(Data[i].brandname, Data[i].brandid));
                    }
                    $("#selectbrandname").prop('disabled', false);
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

    function Refresh() {
        $("#brandnametbl tbody").empty();
        $("#brandnametbl").prop('hidden', true);
        $('#addbtn').prop('disabled', true);
        $('#savebtn').prop('disabled', true);
        $('#cancelbtn').prop('disabled', true);
        $('#searchbtn').prop('disabled', false);
        $("#selectbrandname").val("-1");
        $("#selectbrandname").prop('disabled', false);
        $("#addCheckbox").prop('disabled', false);
        $("#getBrandName").val("");
        $("#getBrandName").prop('disabled', true);
        $("#addCheckbox").prop('checked', false);


    }

</script>

</html>