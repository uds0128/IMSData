<!DOCTYPE html>
<html>
   <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
   <meta content="utf-8" http-equiv="encoding">
   <head>
      <title>Ceramic Hub</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script>
         function SomeDeleteRowFunction(o) {
         
         var p=o.parentNode.parentNode;
         p.parentNode.removeChild(p);
         }
         function select1()
         {
            var a = document.getElementById('pname').value;
            var b = document.getElementById('unit').value;
            var c = document.getElementById('grade').value;
            if(a==="Cement")
            {  
               document.getElementById("addOther").innerHTML = "";
               document.getElementById("addOther2").innerHTML = "";
               document.getElementById("addOther3").innerHTML = "";
               document.getElementById("grade").innerHTML="";
               document.getElementById("type").innerHTML = "";
               var Arr = ["Select","White Cement","Grey Cement"];
               var Arr2 = ["Select","White Cement","Grey Cement"];
                     var x = document.getElementById("type");
                     for(i=0;i<Arr.length;i++)
                     {
                        var option = document.createElement("option");
                        option.text = Arr[i];
                        option.value = Arr2[i];
                        x.add(option); 
                     }
            }
            
            else if(a==="Ceramic")
            {
             
               document.getElementById("addOther").innerHTML = "";
               document.getElementById("addOther2").innerHTML = ""; 
               document.getElementById("addOther3").innerHTML = ""; 
               document.getElementById("type").innerHTML = "";
               document.getElementById("grade").innerHTML="";
               document.getElementById('unit').value = "Box";
               var Arr = ["Select","Vitrified Tiles","Wall Tiles","Floor Tiles","Parking Tiles"];
               var Arr3 = ["Select","Vitrified Tiles","Wall Tiles","Floor Tiles","Parking Tiles"];
               
                     var x = document.getElementById("type");
                     for(i=0;i<Arr.length;i++)
                     {
                        var option = document.createElement("option");
                        option.text = Arr[i];
                        option.value = Arr3[i];
                        x.add(option); 
                     }
               var arr2 = ["Premium","Standard","Commercial","Economical"];
               var y = document.getElementById("grade");
                     for(i=0;i<arr2.length;i++)
                     {
                        var option = document.createElement("option");
                        option.text = arr2[i];
                        y.add(option); 
                     }
            }
            else if(a==="Senitryware")
            {
               
               document.getElementById("addOther").innerHTML = "";
               document.getElementById("addOther2").innerHTML = "";
               document.getElementById("addOther3").innerHTML = "";
               document.getElementById("type").innerHTML = "";
               document.getElementById('unit').value = "Piece";
               document.getElementById("grade").innerHTML="";
         
               var Arr = ["Select","One Piece","Wall Huge","Table Top","Full Pedestal Set","Half Pedestal Set","Wash Basin","Water Closet","Pan","Urinal","P-Trap","Designer Set","Designer TT","Designer Basin","Seat Cover"];
               var Arr3 = ["Select","One Piece","Wall Huge","Table Top","Full Pedestal Set","Half Pedestal Set","Wash Basin","Water Closet","Pan","Urinal","P-Trap","Designer Set","Designer TT","Designer Basin","Seat Cover"];
                     var x = document.getElementById("type");
                     for(i=0;i<Arr.length;i++)
                     {
                        var option = document.createElement("option");
                        option.text = Arr[i];
                        option.value = Arr3[i];
                        x.add(option); 
                     }
               var arr2 = ["Premium","Standard","Commercial"];
               var y = document.getElementById("grade");
                     for(i=0;i<arr2.length;i++)
                     {
                        var option = document.createElement("option");
                        option.text = arr2[i];
                        y.add(option); 
                     }
            }
            else if(a==="Bathroom Fitting")
            {
               
               document.getElementById("addOther").innerHTML = "";
               document.getElementById("addOther2").innerHTML = "";
               document.getElementById("addOther3").innerHTML = "";
               document.getElementById("type").innerHTML = "";
               document.getElementById('unit').value = "Piece";
               var Arr = ["Select","Faucets","Showers","Arms","Faucets","Tubes","Allies Faucets","Allied","Concealed","Accessories"];
               var Arr3 = ["Select","Faucets","Showers","Arms","Faucets","Tubes","Allies Faucets","Allied","Concealed","Accessories"];
                     var x = document.getElementById("type");
                     for(i=0;i<Arr.length;i++)
                     {
                        var option = document.createElement("option");
                        option.text = Arr[i];
                        option.value = Arr3[i];
                        x.add(option); 
                     }
            }
            else if(a==="Stone")
            {
               
               document.getElementById("addOther").innerHTML = "";
               document.getElementById("addOther2").innerHTML = "";
               document.getElementById("addOther3").innerHTML = "";
               document.getElementById("type").innerHTML = "";
               document.getElementById('unit').value = "Feet";
               document.getElementById("grade").innerHTML="";
               var Arr = ["Select","Marble","Granite","Cota Stone","Stone","Etc"];
               var Arr3 = ["Select","Marble","Granite","Cota Stone","Stone","Etc"];
                     var x = document.getElementById("type");
                     for(i=0;i<Arr.length;i++)
                     {
                        var option = document.createElement("option");
                        option.text = Arr[i];
                        option.value = Arr3[i];
                        x.add(option); 
                     }
            }
            else if(a==="Kichen Sink")
            {
               
               document.getElementById("addOther").innerHTML = "";
               document.getElementById("addOther2").innerHTML = "";
               document.getElementById("addOther3").innerHTML = "";
               document.getElementById("type").innerHTML = "";
               document.getElementById('unit').value = "Piece";
               document.getElementById("grade").innerHTML="";
               var Arr = ["Select","Granite Sink","Steel Sink"];
         
               var Arr3 = ["Select","Granite Sink","Steel Sink"];
                     var x = document.getElementById("type");
                     for(i=0;i<Arr.length;i++)
                     {
                        var option = document.createElement("option");
                        option.text = Arr[i];
                        option.value = Arr3[i];
                        x.add(option); 
                     }
            }
            else if(a==="Chemicals")
            {
         
               document.getElementById("addOther").innerHTML = "";
               document.getElementById("addOther2").innerHTML = "";
               document.getElementById("addOther3").innerHTML = "";
               
               document.getElementById("type").innerHTML = "";
               document.getElementById('unit').value = "KG";
               document.getElementById("grade").innerHTML="";
               var Arr = ["Select","Adhersives","Epoxy","Grouts","Admixer","Cleaner","Accessories"];
               var Arr3 = ["Select","Adhersives","Epoxy","Grouts","Admixer","Cleaner","Accessories"];
                     var x = document.getElementById("type");
                     for(i=0;i<Arr.length;i++)
                     {
                        var option = document.createElement("option");
                        option.text = Arr[i];
                        option.value = Arr3[i];
                        x.add(option); 
                     }
            }
            else if(a==="Hardware")
            {
         
               document.getElementById("addOther").innerHTML = "";
               document.getElementById("addOther2").innerHTML = "";
               document.getElementById("addOther3").innerHTML = "";
               document.getElementById("type").innerHTML = "";
               document.getElementById('unit').value = "Piece";
               document.getElementById("grade").innerHTML="";
               var Arr = ["Select","Waste Pipe","Coupling","Supply Pipe","Waste Jali","Rack Bolts","Tank","Seat Cover","Brackets","Showers","Arms","Tubes","Jet Spary","C.P. Nippels","Accessories","Etc"];
               var Arr3 = ["Select","Waste Pipe","Coupling","Supply Pipe","Waste Jali","Rack Bolts","Tank","Seat Cover","Brackets","Showers","Arms","Tubes","Jet Spary","C.P. Nippels","Accessories","Etc"];
                     var x = document.getElementById("type");
                     for(i=0;i<Arr.length;i++)
                     {
                        var option = document.createElement("option");
                        option.text = Arr[i];
                        option.value = Arr3[i];
                        x.add(option); 
                     }
            }
            else if(a==="Other")
            {
               /*var input = document.createElement("input");
               input.type = "text";
               input.className = "form-control"; // set the CSS class
               document.getElementById("addOther").appendChild(input);*/
               document.getElementById("addOther").innerHTML = "<input type='text' class='form-control' id='newname' placeholder='Enter Name'>";
               document.getElementById("addOther2").innerHTML = "<input type='text' class='form-control' id='newtype' placeholder='Enter Type'>";
               document.getElementById("addOther3").innerHTML = "<input type='text' class='form-control' id='newcom' placeholder='Enter Brand'>";
                     }
            
               
         }
         function com1()
         {
            var a = document.getElementById('type').value;
         
            
            if(a==="White Cement")
            {
               document.getElementById("com").innerHTML = "";
               document.getElementById('unit').value = "KG";
               var Arr = ["JK","Birla","Global","Others"];
               var Arr2 = ["JK","Birla","Global","Others"];
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
               var Arr = ["JK","Others"];
               var Arr2 = ["JK","Others"];
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
               var Arr = ["Color Granito","Capron Vitrified","Roton Vitrified","Ramest Vitrified","Platina Vitrified"];
               var Arr2 = ["Color Granito","Capron Vitrified","Roton Vitrified","Ramest Vitrified","Platina Vitrified"];
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
               var Arr = ["Satyam Ceramic","Super Star Ceramic","Plazma Ceramic"];
               var Arr2 = ["Satyam Ceramic","Super Star Ceramic","Plazma Ceramic"];
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
               var Arr = ["Color Tiles","Platinum Ceramic","Cefon Ceramic","Diliso Ceramic","Zibon Ceramic","Sonara Ceramic","Amodh Ceramic","Manish Ceramic"];
               var Arr2 = ["Color Tiles","Platinum Ceramic","Cefon Ceramic","Diliso Ceramic","Zibon Ceramic","Sonara Ceramic","Amodh Ceramic","Manish Ceramic"];
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
               var Arr = ["Auckland Ceramic","Yuvi Ceramic","Luton Ceramic","Others"];
               var Arr2 = ["Auckland Ceramic","Yuvi Ceramic","Luton Ceramic","Others"];
                     var x = document.getElementById("com");
                     for(i=0;i<Arr.length;i++)
                     {
                        var option = document.createElement("option");
                        option.text = Arr[i];
                        option.value = Arr2[i];
                        x.add(option); 
                     }
            }
         }
         function checkRadio(radio) {
               if (radio.id === "ev"){
                     document.getElementById("button").innerHTML = "<input type='text' placeholder='Enter Vendor' class='form-control' id='vname'>";
                  }
               else if (radio.id === "nv"){
                     document.getElementById("button").innerHTML = "";
                  }
               else if(radio.id == "cash"){
                  document.getElementById("rb1").innerHTML = "<div class='form-group col-md-2'></div><div class='form-group col-md-10'><div class ='form-check form-check-inline'><input type='radio' class ='form-check-input' name ='credit' id ='c' onchange='checkRadio(this)'><label class ='form-check-label' for ='inlineRadio5'>Partial</label></div><div class='form-check form-check-inline'><input type='radio' class ='form-check-input' name ='credit' id ='cr' onchange='checkRadio(this)'><label class ='form-check-label' for ='inlineRadio6'>Full</label></div></div>";
               }
               else if(radio.id == "credit"){
                  document.getElementById("rb1").innerHTML = "";
               }
               else if(radio.id == "c"){
                  document.getElementById("rb2").innerHTML = "<input type='text' placeholder='Enter Amount' class='form-control'>";

               }
               else if(radio.id == "cr"){
                  document.getElementById("rb2").innerHTML = "";
                  document.getElementById("rp").value="0";
               }
         }         
      </script>
   </head>
   <body>
      <div class="container-fluid col-lg-12">
         <div class="row">
            <div class="col-md-12">
               <div class="card card-primary">
                  <div class="card-header" style="background-color: #2B60DE">
                     <h3 class="card-title" style="color: white">New Inward</h3>
                  </div>
                  <div class="card-body">
                     <form class="row g-3">
                        <div class="form-group col-md-4"> 
                           <label class="form-label">Date of Purchase: </label>       
                           <input type="date" name="dop" id="dop" class="form-control">
                        </div>
                        <div class="form-group col-md-8">
                           <label class="form-label">Vendor :</label>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="nv" id="nv" value="nv" onchange="checkRadio(this)">
                              <label class="form-check-label" for="inlineRadio1">New Vendor</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="nv" id="ev" value="ev" onchange="checkRadio(this)">
                              <label class="form-check-label" for="inlineRadio2">Existing Vendor</label>
                           </div>
                        </div>
                        <div class="form-group col-md-4">
                           <div id="button">
                           </div>
                        </div>
                        <hr>
                        <div class="form-group col-md-4">
                           <label class="form-label">Product Name: </label>
                           <select id="pname" onchange="select1()" class="form-select col-md-12">
                              <option selected>Select Product</option>
                              <option value="Cement">Cement</option>
                              <option value="Ceramic">Ceramic</option>
                              <option value="Senitryware">Senitryware</option>
                              <option value="Bathroom_Fitting">Bathroom Fitting</option>
                              <option value="Stone">Stone</option>
                              <option value="Kichen_Sink">Kichen Sink</option>
                              <option value="Chemicals">Chemicals</option>
                              <option value="Hardware">Hardware</option>
                              <option value="Other">Other</option>
                           </select>
                        </div>
                        <div class="form-group col-md-4">
                           <label class="form-label">Product Type: </label>
                           <select id = "type" onchange="com1()" class="form-select">
                              <option>Select</option>
                           </select>
                        </div>
                        <div class="form-group col-md-4">
                           <label class="form-label">HSN Code: </label>
                           <input type="Text" name="HSN" class="form-control" id='hsn'>
                        </div>
                        <div class="form-group col-md-4" id="addOther">
                        </div>
                        <div class="form-group col-md-4" id="addOther2">
                        </div>
                        <div class="form-group col-md-4">
                        </div>
                        <div class="form-group col-md-4">
                           <label class="form-label">Brand Name: </label>
                           <select id = "com" class="form-select">
                              <option>Select</option>
                           </select>
                        </div>
                        <div class="form-group col-md-4">
                           <label class="form-label">Color/Type: </label>
                           <input type="text" name="toc" id="toc" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                           <label class="form-label">Grade: </label>
                           <input type="text" name="grade" id="grade" class="form-control">
                        </div>
                        <div class="form-group col-md-12" id="addOther3">
                        </div>
                        <div class="form-group col-md-4">
                           <label class="form-label">Code No. / Model No. / Design No.: </label>
                           <input type="text" name="cmd" class="form-control" id="cmd"> 
                        </div>
                        <div class="form-group col-md-6">
                           <label class="form-label">Stock Type: </label>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="bill" id="bill" value="bill" onchange="checkRadio(this)">
                              <label class="form-check-label" for="inlineRadio1">Billing</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="bill" id="other" value="other" onchange="checkRadio(this)">
                              <label class="form-check-label" for="inlineRadio1">Other</label>
                           </div>
                        </div>
                        <div class="form-group col-md-3">
                           <label class="form-label">Unit of Purchase: </label>
                           <input type="text" name="unit" class="form-control" id="unit">
                        </div>
                        <div class="form-group col-md-9">
                        </div>
                        <div class="form-group col-md-3">
                           <label class="form-label">Weight/Piece/Packaging Size: </label>
                           <input type="text" name="size" class="form-control" id="wp">
                        </div>
                        <div class="form-group col-md-4">
                           <label class="form-label">Batch No.: </label>
                           <input type="text" name="bn" class="form-control" id="bn"> 
                        </div>
                        <div class="form-group col-md-5">
                        </div>
                        <div class="form-group col-md-2">
                           <label class="form-label">Base Price: </label>
                           <input type="text" name="basep" class="form-control" id="basep">
                        </div>
                        <div class="form-group col-md-2">
                           <label class="form-label">CGST: </label>
                           <select class="form-select" id="cgst">
                              <option value="5">5</option>
                              <option value="12">12</option>
                              <option value="18">18</option>
                              <option value="28">28</option>
                           </select>
                        </div>
                        <div class="form-group col-md-2">
                           <label class="form-label">SGST: </label>
                           <select class="form-select" id="sgst">
                              <option value="5">5</option>
                              <option value="12">12</option>
                              <option value="18">18</option>
                              <option value="28">28</option>
                           </select>
                        </div>
                        <div class="form-group col-md-6">
                        </div>
                        <div class="form-group col-md-2">
                           <label class="form-label">Discount: </label>
                           <input type="text" name="disc" class="form-control" id="disc">
                        </div>
                        <div class="form-group col-md-2">
                           <label class="form-label">Quantity: </label>
                           <input type="text" name="qu" class="form-control" id="qu">
                        </div>
                        <div class="form-group col-md-8">
                        </div>
                        <div class="form-group col-md-2">
                           <label class="form-label">Transpotation Cost: </label>
                           <input type="text" name="tc" class="form-control" id="tc">
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                           <label class="form-label">Payment detail :</label>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="cash" id="cash" value="cash" onchange="checkRadio(this)">
                              <label class="form-check-label" for="inlineRadio3">Cash</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="cash" id="credit" value="credit" onchange="checkRadio(this)">
                              <label class="form-check-label" for="inlineRadio4">Credit</label>
                           </div>
                        </div>
                        <div class="form-group col-md-12">
                           <div id="rb1">
                           </div>
                        </div>
                        <div class="form-group col-md-2">
                           <div id="rb2">
                           </div>
                        </div>
                        <div class="form-group col-md-9"></div>
                        <div class="form-group col-md-2">
                           <label class="form-label">Remaining Payment: </label>
                           <input type="text" name="rp" class="form-control" id="rp">
                        </div>
                        <br>
                        <div class="col-12">
                           <input type="Button" value="Add" id="add_data" class="btn btn-primary">
                           <input type="reset" value="Reset" id="reset" class="btn btn-primary">
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <br>
         <div class="row">
            <div class="col-md-12">
               <div class="card card-primary" style="overflow-x:auto;">
                  <table class="table" id="data_table">
                     <thead>
                        <tr>
                           <th>Date of Purchase</th>
                           <th>Vendor Name</th>
                           <th>Product Name</th>
                           <th>Product Type</th>
                           <th>HSN Code</th>
                           <th>Brand Name</th>
                           <th>Color/Type</th>
                           <th>Grade</th>
                           <th>code.</th>
                           <th>Packing Unit</th>
                           <th>Size</th>
                           <th>Batch No</th>
                           <th>Base Price</th>
                           <th>CGST</th>
                           <th>SGST</th>
                           <th>Discount</th>
                           <th>Qty</th>
                           <th>Transport Cost</th>
                           <th>Remaining Payment</th>
                           <th>Update</th>
                        </tr>
                     </thead>
                     <tbody>
                     </tbody>
                  </table>
                  <div style="display: grid">
                  <div style="grid-column: 1">
                     <div class="form-group col-md-3">
                        <label class="form-label">Notes: </label>
                        <input type="text" name="n" class="form-control" id="n">
                     </div>
                     <div class="form-group col-md-3">
                        <label class="form-label">Upload Bill: </label>
                        <input type="file" name="ub" class="form-control" id="ub">
                     </div>
                  </div>
                  <div style="grid-column: 2">
                     <p>Total Bill: <span id="tbill"></span></p>
                     <p>Total GST: <span id="tgst"></p>
                     <p>Total Transport Cost: <span id="ttcost"></p>
                     <p>Total Paid: <span id="tpaid"></p>
                     <p>Total Remaining: <span id="trem"></p>
                  </div>
                  </div>
                  <div class="col-12">
                        <center><input type="Button" value="Save" id="save" class="btn btn-success"></center>
                     </div>
               </div>
               <br>
            </div>
         </div>
      </div>
      </section>
   </body>
   <script type="text/javascript">
      var totalBill = 0;
      var gst=0;
      var r=0;
      var trcost = 0;
      $(function(){
         
         $('#add_data').click(function(){
      
            var name = $('#pname').val();
            var type = $('#type').val();
            var HSN = $('#hsn').val();
            var com = $('#com').val();
            var unit = $('#unit').val();
            var size = $('#wp').val();
            var grade = $('#grade').val();
            var code = $('#cmd').val();
            var cgst = $('#cgst').val();
            var sgst = $('#sgst').val();
            var datep = $('#dop').val();
            var vname = $('#vname').val();
            var qty = $('#qu').val();
            var disc = $('#disc').val();
            var tcost = $('#tc').val();
            var rpayment = $('#rp').val();
            var batchno = $('#bn').val();
            var bprice = $('#basep').val();
            var color_type = $('#toc').val();
            
            totalBill = totalBill + (bprice*qty)-disc;
            gst = ((cgst+sgst)*totalBill)/100;
            r = r + rpayment;
            trcost = trcost + tcost;

           // document.getElementById("tbill").innerHTML=totalBill;
            //document.getElementById("tgst").innerHTML=gst;
            //document.getElementById("trem").innerHTML=r;
            //document.getElementById("ttcost").innerHTML=trcost;
            if(name=="Other")
            {
               name=$('#newname').val();
               type=$('#newtype').val();
               com=$('#newcom').val();
            }
          
            if(name!="Select Product"&&type!="Select"&&HSN!=""&&com!="Select"&&unit!=""&&size!=""&&grade!=""&&code!=""&&cgst!=""&&sgst!="")
            {
               
            $('#data_table tbody:last-child').append(
                  '<tr>'+
                     '<td>'+datep+'</td>'+
                     '<td>'+vname+'</td>'+
                     '<td>'+name+'</td>'+
                     '<td>'+type+'</td>'+
                     '<td>'+HSN+'</td>'+
                     '<td>'+com+'</td>'+
                     '<td>'+color_type+'</td>'+
                     '<td>'+grade+'</td>'+
                     '<td>'+code+'</td>'+
                     '<td>'+unit+'</td>'+
                     '<td>'+size+'</td>'+
                     '<td>'+batchno+'</td>'+
                     '<td>'+bprice+'</td>'+
                     '<td>'+cgst+'</td>'+
                     '<td>'+sgst+'</td>'+
                     '<td>'+disc+'</td>'+
                     '<td>'+qty+'</td>'+
                     '<td>'+tcost+'</td>'+
                     '<td>'+rpayment+'</td>'+
                     '<td><input type="button" class="btn btn-link btn-sm" value="Edit"> <input type="button" class="btn btn-link btn-sm" value="Delete" onclick="SomeDeleteRowFunction(this)"> <input type="button" class="btn btn-link btn-sm" value="Copy"></td>'+
      
                  '</tr>'
               );
         }
         else{
            alert("All fields are required");
         }
      
            
         });
      
      });
      
   </script>
</html>

