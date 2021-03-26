<!DOCTYPE html>
<html lang="en">

<head>
    <title>Challan</title>
    <!-- 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<!--     <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

    <!-- modal for new customer -->
    <script>
        $('input[name="customer"]').change(function() {
        if($(this).is(':checked') && $(this).val() == '0') {
                $('#myModal').modal('show');
        }
        });
    </script>

    <!-- add value from modal to main page -->
    <script>
        $(document).ready(function(){
            $('#buttonAdd').click(function(){
                var databack = $("myModal1 #exName").val().trim();
                $('#result1').html(databack);

                var databack1 = $("myModal1 #exCost").val().trim();
                $('#result2').html(databack1);
            });
        });
    </script>

    <script>
        function SomeDeleteRowFunction(o) {
            var p = o.parentNode.parentNode;
            p.parentNode.removeChild(p);
        }

        function showDiv() {
            document.getElementById('extra').style.display = "block";
            document.getElementById('extra1').style.display = "block";
        }

        function select1() {
            var a = document.getElementById('pname').value;
            var b = document.getElementById('unit').value;
            var c = document.getElementById('grade').value;
            if (a === "Cement") {
                document.getElementById("addOther").innerHTML = "";
                document.getElementById("addOther2").innerHTML = "";
                document.getElementById("addOther3").innerHTML = "";
                document.getElementById("grade").innerHTML = "";
                document.getElementById("type").innerHTML = "";
                var Arr = ["Select", "White Cement", "Grey Cement"];
                var Arr2 = ["Select", "White Cement", "Grey Cement"];
                var x = document.getElementById("type");
                for (i = 0; i < Arr.length; i++) {
                    var option = document.createElement("option");
                    option.text = Arr[i];
                    option.value = Arr2[i];
                    x.add(option);
                }
            }

            else if (a === "Ceramic") {

                document.getElementById("addOther").innerHTML = "";
                document.getElementById("addOther2").innerHTML = "";
                document.getElementById("addOther3").innerHTML = "";
                document.getElementById("type").innerHTML = "";
                document.getElementById("grade").innerHTML = "";
                document.getElementById('unit').value = "Box";
                var Arr = ["Select", "Vitrified Tiles", "Wall Tiles", "Floor Tiles", "Parking Tiles"];
                var Arr3 = ["Select", "Vitrified Tiles", "Wall Tiles", "Floor Tiles", "Parking Tiles"];

                var x = document.getElementById("type");
                for (i = 0; i < Arr.length; i++) {
                    var option = document.createElement("option");
                    option.text = Arr[i];
                    option.value = Arr3[i];
                    x.add(option);
                }
                var arr2 = ["Premium", "Standard", "Commercial", "Economical"];
                var y = document.getElementById("grade");
                for (i = 0; i < arr2.length; i++) {
                    var option = document.createElement("option");
                    option.text = arr2[i];
                    y.add(option);
                }
            }
            else if (a === "Senitryware") {

                document.getElementById("addOther").innerHTML = "";
                document.getElementById("addOther2").innerHTML = "";
                document.getElementById("addOther3").innerHTML = "";
                document.getElementById("type").innerHTML = "";
                document.getElementById('unit').value = "Piece";
                document.getElementById("grade").innerHTML = "";

                var Arr = ["Select", "One Piece", "Wall Huge", "Table Top", "Full Pedestal Set", "Half Pedestal Set", "Wash Basin", "Water Closet", "Pan", "Urinal", "P-Trap", "Designer Set", "Designer TT", "Designer Basin", "Seat Cover"];
                var Arr3 = ["Select", "One Piece", "Wall Huge", "Table Top", "Full Pedestal Set", "Half Pedestal Set", "Wash Basin", "Water Closet", "Pan", "Urinal", "P-Trap", "Designer Set", "Designer TT", "Designer Basin", "Seat Cover"];
                var x = document.getElementById("type");
                for (i = 0; i < Arr.length; i++) {
                    var option = document.createElement("option");
                    option.text = Arr[i];
                    option.value = Arr3[i];
                    x.add(option);
                }
                var arr2 = ["Premium", "Standard", "Commercial"];
                var y = document.getElementById("grade");
                for (i = 0; i < arr2.length; i++) {
                    var option = document.createElement("option");
                    option.text = arr2[i];
                    y.add(option);
                }
            }
            else if (a === "Bathroom Fitting") {

                document.getElementById("addOther").innerHTML = "";
                document.getElementById("addOther2").innerHTML = "";
                document.getElementById("addOther3").innerHTML = "";
                document.getElementById("type").innerHTML = "";
                document.getElementById('unit').value = "Piece";
                var Arr = ["Select", "Faucets", "Showers", "Arms", "Faucets", "Tubes", "Allies Faucets", "Allied", "Concealed", "Accessories"];
                var Arr3 = ["Select", "Faucets", "Showers", "Arms", "Faucets", "Tubes", "Allies Faucets", "Allied", "Concealed", "Accessories"];
                var x = document.getElementById("type");
                for (i = 0; i < Arr.length; i++) {
                    var option = document.createElement("option");
                    option.text = Arr[i];
                    option.value = Arr3[i];
                    x.add(option);
                }
            }
            else if (a === "Stone") {

                document.getElementById("addOther").innerHTML = "";
                document.getElementById("addOther2").innerHTML = "";
                document.getElementById("addOther3").innerHTML = "";
                document.getElementById("type").innerHTML = "";
                document.getElementById('unit').value = "Feet";
                document.getElementById("grade").innerHTML = "";
                var Arr = ["Select", "Marble", "Granite", "Cota Stone", "Stone", "Etc"];
                var Arr3 = ["Select", "Marble", "Granite", "Cota Stone", "Stone", "Etc"];
                var x = document.getElementById("type");
                for (i = 0; i < Arr.length; i++) {
                    var option = document.createElement("option");
                    option.text = Arr[i];
                    option.value = Arr3[i];
                    x.add(option);
                }
            }
            else if (a === "Kichen Sink") {

                document.getElementById("addOther").innerHTML = "";
                document.getElementById("addOther2").innerHTML = "";
                document.getElementById("addOther3").innerHTML = "";
                document.getElementById("type").innerHTML = "";
                document.getElementById('unit').value = "Piece";
                document.getElementById("grade").innerHTML = "";
                var Arr = ["Select", "Granite Sink", "Steel Sink"];

                var Arr3 = ["Select", "Granite Sink", "Steel Sink"];
                var x = document.getElementById("type");
                for (i = 0; i < Arr.length; i++) {
                    var option = document.createElement("option");
                    option.text = Arr[i];
                    option.value = Arr3[i];
                    x.add(option);
                }
            }
            else if (a === "Chemicals") {

                document.getElementById("addOther").innerHTML = "";
                document.getElementById("addOther2").innerHTML = "";
                document.getElementById("addOther3").innerHTML = "";

                document.getElementById("type").innerHTML = "";
                document.getElementById('unit').value = "KG";
                document.getElementById("grade").innerHTML = "";
                var Arr = ["Select", "Adhersives", "Epoxy", "Grouts", "Admixer", "Cleaner", "Accessories"];
                var Arr3 = ["Select", "Adhersives", "Epoxy", "Grouts", "Admixer", "Cleaner", "Accessories"];
                var x = document.getElementById("type");
                for (i = 0; i < Arr.length; i++) {
                    var option = document.createElement("option");
                    option.text = Arr[i];
                    option.value = Arr3[i];
                    x.add(option);
                }
            }
            else if (a === "Hardware") {

                document.getElementById("addOther").innerHTML = "";
                document.getElementById("addOther2").innerHTML = "";
                document.getElementById("addOther3").innerHTML = "";
                document.getElementById("type").innerHTML = "";
                document.getElementById('unit').value = "Piece";
                document.getElementById("grade").innerHTML = "";
                var Arr = ["Select", "Waste Pipe", "Coupling", "Supply Pipe", "Waste Jali", "Rack Bolts", "Tank", "Seat Cover", "Brackets", "Showers", "Arms", "Tubes", "Jet Spary", "C.P. Nippels", "Accessories", "Etc"];
                var Arr3 = ["Select", "Waste Pipe", "Coupling", "Supply Pipe", "Waste Jali", "Rack Bolts", "Tank", "Seat Cover", "Brackets", "Showers", "Arms", "Tubes", "Jet Spary", "C.P. Nippels", "Accessories", "Etc"];
                var x = document.getElementById("type");
                for (i = 0; i < Arr.length; i++) {
                    var option = document.createElement("option");
                    option.text = Arr[i];
                    option.value = Arr3[i];
                    x.add(option);
                }
            }
            else if (a === "Other") {
                /*var input = document.createElement("input");
                input.type = "text";
                input.className = "form-control"; // set the CSS class
                document.getElementById("addOther").appendChild(input);*/
                document.getElementById("addOther").innerHTML = "<input type='text' class='form-control' id='newname' placeholder='Enter Name'>";
                document.getElementById("addOther2").innerHTML = "<input type='text' class='form-control' id='newtype' placeholder='Enter Type'>";
                document.getElementById("addOther3").innerHTML = "<input type='text' class='form-control' id='newcom' placeholder='Enter Brand'>";
            }


        }

        // code for company name in select but we need to add all the comapany and its easy with database......

        /*  function com1()
          {
             var a = document.getElementById('type').value;
          
             
             if(a==="White Cement")
             {
                document.getElementById("com").innerHTML = "";
                document.getElementById('unit').value = "KG";
                var Arr = ["Select","JK","Birla","Global","Others"];
                var Arr2 = ["Select","JK","Birla","Global","Others"];
                      var x = document.getElementById("com");
                      for(i=0;i<Arr.length;i++)
                      {
                         var option = document.createElement("option");
                         option.text = Arr[i];
                         option.value = Arr2[i];
                         x.add(option); 
                      }
             }
             else if(a==="Grey Cement")
             {
                
                document.getElementById("com").innerHTML = "";
                document.getElementById('unit').value = "Bag";
                var Arr = ["Select","JK","Others"];
                var Arr2 = ["Select","JK","Others"];
                      var x = document.getElementById("com");
                      for(i=0;i<Arr.length;i++)
                      {
                         var option = document.createElement("option");
                         option.text = Arr[i];
                         option.value = Arr2[i];
                         x.add(option); 
                      }
             }
             else if(a==="Vitrified Tiles")
             {
                
                document.getElementById("com").innerHTML = "";
                document.getElementById('unit').value = "Box";
                var Arr = ["Select","Color Granito","Capron Vitrified","Roton Vitrified","Ramest Vitrified","Platina Vitrified"];
                var Arr2 = ["Select","Color Granito","Capron Vitrified","Roton Vitrified","Ramest Vitrified","Platina Vitrified"];
                      var x = document.getElementById("com");
                      for(i=0;i<Arr.length;i++)
                      {
                         var option = document.createElement("option");
                         option.text = Arr[i];
                         option.value = Arr2[i];
                         x.add(option); 
                      }
             }
             else if(a==="Floor Tiles")
             {
                
                document.getElementById("com").innerHTML = "";
                document.getElementById('unit').value = "Bag";
                var Arr = ["Select","Satyam Ceramic","Super Star Ceramic","Plazma Ceramic"];
                var Arr2 = ["Select","Satyam Ceramic","Super Star Ceramic","Plazma Ceramic"];
                      var x = document.getElementById("com");
                      for(i=0;i<Arr.length;i++)
                      {
                         var option = document.createElement("option");
                         option.text = Arr[i];
                         option.value = Arr2[i];
                         x.add(option); 
                      }
             }
             else if(a==="Wall Tiles")
             {
                
                document.getElementById("com").innerHTML = "";
                document.getElementById('unit').value = "Box";
                var Arr = ["Select","Color Tiles","Platinum Ceramic","Cefon Ceramic","Diliso Ceramic","Zibon Ceramic","Sonara Ceramic","Amodh Ceramic","Manish Ceramic"];
                var Arr2 = ["Select","Color Tiles","Platinum Ceramic","Cefon Ceramic","Diliso Ceramic","Zibon Ceramic","Sonara Ceramic","Amodh Ceramic","Manish Ceramic"];
                      var x = document.getElementById("com");
                      for(i=0;i<Arr.length;i++)
                      {
                         var option = document.createElement("option");
                         option.text = Arr[i];
                         option.value = Arr2[i];
                         x.add(option); 
                      }
             }
             else if(a=="Parking Tiles")
             {
                document.getElementById("com").innerHTML = "";
                document.getElementById('unit').value = "Box";
                var Arr = ["Select","Auckland Ceramic","Yuvi Ceramic","Luton Ceramic","Others"];
                var Arr2 = ["Select","Auckland Ceramic","Yuvi Ceramic","Luton Ceramic","Others"];
                      var x = document.getElementById("com");
                      for(i=0;i<Arr.length;i++)
                      {
                         var option = document.createElement("option");
                         option.text = Arr[i];
                         option.value = Arr2[i];
                         x.add(option); 
                      }
             }
          }*/
        function addunit1() {
            document.getElementById("Unit1").value = "KG";
            document.getElementById("Unit1").readOnly = true;
        }
        function addunit2() {
            document.getElementById("Unit1").value = "Pieces";
            document.getElementById("Unit1").readOnly = true;
        }
        function addunit3() {

            document.getElementById("Unit1").value = "";
            document.getElementById("Unit1").readOnly = false;
        }

    </script>
</head>

<body>
    <div class="container-fluid col-lg-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #2B60DE">
                        <h3 class="card-title" style="color: white">Challan</h3>
                    </div>
                    <div class="card-body">
                        <form class="row g-3">
                                <div class="form-group col-md-2">
                                    <label class="form-label" style="margin-left: 2px">Date:</label>
                                    <input type="date" id="Date" name="Date" class="form-control col-md-5">
                                </div>
                                <div class="form-group col-md-2"></div>
                                <div class="form-group col-md-2"></div>
                                <div>
                                    <!-- <div class="form-check form-check-inline"></div>
                                    <div class="form-check form-check-inline"></div> -->
                                    <div class="form-check form-check-inline" style="margin-left: 15px">
                                        <input class="form-check-input" type="radio" name="customer" id="Customer" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Existing Customer</label>
                                    </div>
                                    <div class="form-check form-check-inline" style="margin-left: 15px">
                                        <input class="form-check-input" type="radio" name="customer" id="newcustomer" value="0" data-toggle="modal" data-target="#myModal">
                                        <label class="form-check-label" for="inlineRadio2"><span>New Customer</span></label>
                                    </div>
                                    <br>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" style="margin-top: 20px;">Name of Customer: </label>
                                        <input class="form-control" list="customerName"
                                            placeholder="Enter Customer Name...">
                                        <datalist id="customerName">
                                            <option>Vraj Shah</option>
                                            <option>Jayati Sakervala</option>
                                        </datalist>
                                    </div>

                                    <div class="form-group col-md-1">
                                        <label class="form-label" style="margin-top: 20px; margin-left: 20px">Item No: </label>
                                        <input type="number" name="srno" class="form-control" id='srno' style="margin-left: 20px">
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="form-label" style="margin-top: 10px;">Product Name: </label>
                                    <select id="pname" onchange="select1()" class="form-select col-md-12" style="font-size: 15px">
                                        <option selected>Select Product</option>
                                        <option value="Cement">Cement</option>
                                        <option value="Ceramic">Ceramic</option>
                                        <option value="Senitryware">Senitryware</option>
                                        <option value="Bathroom Fitting">Bathroom Fitting</option>
                                        <option value="Stone">Stone</option>
                                        <option value="Kichen Sink">Kichen Sink</option>
                                        <option value="Chemicals">Chemicals</option>
                                        <option value="Hardware">Hardware</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" style="margin-top: 10px;">Product Type: </label>
                                    <select id="type" onchange="com1()" class="form-select" style="font-size: 15px">
                                        <option>Select</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" style="margin-top: 10px;">HSN Code: </label>
                                    <input type="number" name="HSN" class="form-control" id='hsn'>
                                </div>
                                <div class="form-group col-md-4" id="addOther"></div>
                                <div class="form-group col-md-4" id="addOther2"></div>
                                <div class="form-group col-md-5">
                                    <label class="form-label">Brand Name: </label>
                                    <!--select id = "com" class="form-select">
                                        <option>Select</option>
                                        </select-->
                                    <input type="text" name="brand" class="form-control col-md-5">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-label">Packing Unit: </label>
                                    <input type="text" name="unit" class="form-control" id="unit">
                                </div>
                                <div class="form-group col-md-5" id="addOther3"></div>
                                <div>
                                    <label class="form-label" style="margin-left: 16px">Product: </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="size" id="Weight"
                                            value="Weight" onclick="addunit1()">
                                        <label class="form-check-label" for="inlineRadio1">Weight</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="size" id="Piece"
                                            value="Piece" onclick="addunit2()">
                                        <label class="form-check-label" for="inlineRadio2">Piece(s)</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="size" id="size" value="size"
                                            onclick="addunit3()">
                                        <label class="form-check-label" for="inlineRadio3">Packaging Size</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" name="size" class="form-control" id="size" placeholder="Size">
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" name="unit1" class="form-control" id="Unit1">
                                </div>
                                
                                <div>
                                    <label class="form-label" style="margin-left: 16px">Product: </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio4" value="option4">
                                        <label class="form-check-label" for="inlineRadio4">Color</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio5" value="option5">
                                        <label class="form-check-label" for="inlineRadio5">Type</label>
                                    </div>
                                    <br>
                                    <div class="form-group col-md-2">
                                        <input type="text" name="size" class="form-control" id="size">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" style="margin-left: 5px">Grade: </label>
                                    <input type="text" name="grade" class="form-control" id="grade" style="margin-left: 5px">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Code No. / Model No. / Design No.: </label>
                                    <input type="text" name="cmd" class="form-control" id="code1">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="form-label">CGST: </label>
                                    <input type="number" name="cgst" class="form-control" id="cgst">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="form-label">SGST: </label>
                                    <input type="number" name="sgst" class="form-control" id="sgst">
                                </div>
                                <br>
                                <div class="form-group col-md-2">
                                    <label class="form-label" style="margin-left: 5px">Selling Rate:</label>
                                    <input type="number" name="sellingRate" id="sellingRate" class="form-control" style="margin-left: 5px">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="form-label">Discount on Selling:</label>
                                    <input type="number" name="discountRate" id="discount" class="form-control">
                                </div>
                                <div class="col-12">
                                    <input type="Button" value="Add" id="add_data" class="btn btn-primary" onclick="showDiv()">
                                    <input type="reset" value="Reset" id="reset" class="btn btn-primary">
                                </div>  
                        </form>

                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog" style="max-width: 300px">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Add New User</h4>
                                        <button type="button" class="close" data-dismiss="modal" style="margin-left: 135px">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="new-user">    
                                            <label class="form-label">Name: </label>
                                            <input type="text" placeholder="Enter Name">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default">Add</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div class="row"> 
            <div class="col-md-12">
                <div class="card card-primary" style="overflow-x:auto;">

                <div class="form-group col-md-2" id="extra1" style="display:none; margin-left: 5px">
                    <form >
                        <label class="form-label" style="margin-top: 10px;">Payment Status: </label>
                        <select id="pname" onchange="select1()" class="form-select col-md-8" style="font-size: 15px">
                            <option selected>Choose Status</option>
                            <option value="Cement">Pending</option>
                            <option value="Ceramic">Completed</option>               
                        </select>
                    </form>
                </div>

                    <table class="table" id="data_table">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Product Name</th>
                                <th>Product Type</th>
                                <th>HSN Code</th>
                                <th>Brand Name</th>
                                <th>Packing Unit</th>
                                <th>Size</th>
                                <th>Grade</th>
                                <th>Code No</th>
                                <th>CGST</th>
                                <th>SGST</th>
                                <th>Selling Rate</th>
                                <th>Discount</th>
                                <th>Update</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                    <div class="col-12" id="extra" style="display:none; margin-left: 15px">
                        <input type="Button" value="Add Other Costs" id="extraCosts" class="btn btn-success" data-toggle="modal" data-target="#myModal1">
                        <!-- Modal -->
                        <div class="modal fade" id="myModal1" role="dialog">
                            <div class="modal-dialog" style="max-width: 350px">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" style="margin-left: -10px">Extra Costs</h4>
                                        <button type="button" class="close" style="margin-left: 200px" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <label class="form-label">Name: </label>
                                            <input type="text" name="eName" class="form-control" id="exName">
                                            <label class="form-label">Cost: </label>
                                            <input type="number" name="cost" class="form-control" id="exCost">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" id="buttonAdd" data-dismiss="modal">Add</button>
                                        <button type="button" class="btn btn-default" id=" id="buttonClose data-dismiss="modal">Close</button>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div id="result1"> </div>
                        <div id="result2"> </div>
                        <br>
                        <textarea rows="5" cols="40" name="comment" form="usrform" style="margin-top: 10px">Notes</textarea>

                        <form style="float: right; margin-right: 20px">
                            <label for="stotal">Subtotal: </label>
                            <input type="number" id="stotal" name="subtotal"><br><br>
                            <label for="discount">Discount: </label>
                            <input type="number" id="discount" name="discount"><br><br>
                            <label for="total">Total: </label>
                            <input type="number" id="total" name="total"><br><br>
                        </form>
                    </div>

                    <div class="col-12">
                        <center><input type="Button" value="Submit" id="submit" class="btn btn-success"></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
      $(function(){
         
         $('#add_data').click(function(){

            var srno = $('#srno').val();
            var name = $('#pname').val();
            var type = $('#type').val();
            var HSN = $('#hsn').val();
            var com = $('#com').val();
            var unit = $('#unit').val();
            var size = $('#size').val();
            var grade = $('#grade').val();
            var code = $('#code1').val();
            var cgst = $('#cgst').val();
            var sgst = $('#sgst').val();
            var sellingrate = $('#sellingRate').val();
            var discount = $('#discount').val();

            if(name=="Other")
            {
               name=$('#newname').val();
               type=$('#newtype').val();
               com=$('#newcom').val();
            }
          
            if(srno!=""&&name!="Select Product"&&type!="Select"&&HSN!=""&&com!="Select"&&unit!=""&&size!=""&&grade!=""&&code!=""&&cgst!=""&&sgst!=""&&sellingrate!=""&&discount!="")
            {
               
            $('#data_table tbody:last-child').append(
                  '<tr>'+
                     '<td>'+srno+'</td>'+
                     '<td>'+name+'</td>'+
                     '<td>'+type+'</td>'+
                     '<td>'+HSN+'</td>'+
                     '<td>'+com+'</td>'+
                     '<td>'+unit+'</td>'+
                     '<td>'+size+'</td>'+
                     '<td>'+grade+'</td>'+
                     '<td>'+code+'</td>'+
                     '<td>'+cgst+'</td>'+
                     '<td>'+sgst+'</td>'+
                     '<td>'+sellingrate+'</td>'+
                     '<td>'+discount+'</td>'+
                     '<td><input type="button" class="btn btn-link btn-sm" value="Edit"> <input type="button" class="btn btn-link btn-sm" value="Delete" onclick="SomeDeleteRowFunction(this)"> <input type="button" class="btn btn-link btn-sm" value="Copy"></td>'+

                  '</tr>'
               );
         }
         else{
            alert("All fields are required");
            
            document.getElementById('extra').style.display = "none";
            document.getElementById('extra1').style.display = "none";
         }

         });
      
      });
      
   </script>
</html>