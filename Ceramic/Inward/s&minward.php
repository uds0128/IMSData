<?php

include('config.php');

?>

<!DOCTYPE html>
<html>
   <head>
      <title>Search and Manage Inward</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script>
         function checkRadio(radio){
               if (radio.id === "Inward ID"){
                     document.getElementById("hsnc").innerHTML = "<input type='text' name='iid' class='form-control' id='iid' placeholder='Enter Inward Id.'>";
                  }
               else if (radio.id === "Vendor Mobile No."){
                     document.getElementById("hsnc").innerHTML = "<input type='text' name='vmob' class='form-control' id='vmob' placeholder='Enter Vendor Mobile No.'>";
                  }
               else if (radio.id === "Vendor Name"){
                     document.getElementById("hsnc").innerHTML = "<input type='text' name='vname' class='form-control' id='vname' placeholder='Enter Vendor Name'>";
                
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
                  <h3 class="card-title" style="color: white" align="center">Search and Manage Inward</h3>
               </div>
               <div class="card-body">
                  <form class="row g-3" id="radio-buttons" action="s&minward.php" method="POST">
                     <div class="form-group col-md-12">
                        <label class="form-label">Search By: </label>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="hsn1" id="Inward ID" value="Inward ID" onchange="checkRadio(this)">
                           <label class="form-check-label" for="inlineRadio1">Inward ID</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="hsn1" id="Date" value="Date" onchange="checkRadio(this)">
                           <label class="form-check-label" for="inlineRadio2">Date</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="hsn1" id="Vendor Name" value="Vendor Name" onchange="checkRadio(this)">
                           <label class="form-check-label" for="inlineRadio3">Vendor name</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="hsn1" id="Vendor Mobile No." value="Vendor Mobile No." onchange="checkRadio(this)">
                            <label class="form-check-label" for="inlineRadio4">Vendor Mobile No.</label>
                         </div>
                     </div>  
                        <div class="form-group col-md-1">
                        </div>
                        <div class="form-group col-md-6" id="hsnc">
                        </div>
                        <div>
                          <input type="submit" value="Search" name="search" id="save" class="btn btn-success">
                          <input style="margin-right: 5px;" type="button" value="Close"  name="close" id="close" class="btn btn-success" onclick="location.href = '../admin.php';">
                        </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
         <br>
         <div class="row">
            <div class="col-md-12">
               <div class="card card-primary">
                  <table class="table" id="data_table">
                     <thead>
                        <tr valign="middle">
                           <th>Inward Id</th>
                           <th>Date of Purchase</th>
                           <th>Vendor Name</th>
                           <th>Total GST</th>
                           <th>Transport and Extra Cost</th>
                           <th>Total Amount</th>
                           <th>Amount Paid</th>
                           <th>Amount Pending</th>
                           <th>Payment Mode</th>
                           <th>Total Discount</th>
                           <th>Notes</th>
                           <th>Stock Type</th>
                           <th>Update</th>
                        </tr>
                     </thead>
                     <tbody>
                      <?php
                                error_reporting(E_ERROR | E_WARNING | E_PARSE);
                                $con=mysqli_connect('localhost','root','','imsu');
                                $iid=$_POST['iid'];
                                // echo $cid;
                                $vname=$_POST['vname'];
                                $vmno1=$_POST['vmob'];
                                
                                if ($_POST['iid']=='' and $_POST['vname']=='' and $_POST['vmno1']=='')
                                {
                                  $query= "SELECT * FROM tblinwardbillmst where RecStatus='A'";
                                  $run = mysqli_query($con,$query);
                                }
                                         
                                else if($_POST['iid'] and $_POST['vname']=='' and $_POST['vmno1']==''){

                                        $query= "SELECT * FROM tblinwardbillmst WHERE InwardId = $iid and RecStatus='A'";
                                        $run = mysqli_query($con,$query);
                                        
                                    }
                                                     
                                                     
                                elseif($_POST['iid']=="" and $_POST['vname'] and $_POST['vmno1']=='')
                                    {
                                        $query="SELECT * FROM tblinwardbillmst WHERE VendorId=$vname and RecStatus='A'";
                                        $run=mysqli_query($con,$query);
                                        
                                    }

                                elseif ($_POST['iid']=='' and $_POST['vname']=='' and $_POST['vmno1']) {
                                        $query="SELECT * FROM tblinwardbillmst WHERE QDate LIKE '$vmno1' AND RecStatus=1";
                                        $run=mysqli_query($con,$query);
                                        
                                                               
                                    }
                                elseif ($_POST['iid']=='' and $_POST['vname']=='' and $_POST['vmno1']) {
                                        $query="SELECT * FROM tblinwardbillmst WHERE QDate BETWEEN '$vmno1' AND '$vmno2' AND RecStatus=1";
                                        $run=mysqli_query($con,$query);
                                                               
                                    }
                                while ($row=mysqli_fetch_array($run))
                                {
                                    $qid=$row[0];
                                    $qdate=$row[1];
                                    $qvid=$row[2];
                                    $qgst=$row[3];
                                    $qtcost=$row[4];
                                    $qamount=$row[5];
                                    $qpaid=$row[6];
                                    $qpending=$row[7];
                                    $qmode=$row[9];
                                    $qdisc=$row[10];
                                    $qnotes=$row[11];
                                    $qtype=$row[16];
                                    // $vemail=$row[3];
                                    // $vaddress=$row[4];
                                  ?>
                      </tr>
                            <td><?php echo $qid; ?></td>
                            <td><?php echo $qdate; ?></td>
                            <td><?php echo $qvid; ?></td>
                            <td><?php echo $qgst ?></td>
                            <td><?php echo $qtcost; ?></td>
                            <td><?php echo $qamount; ?></td>
                            <td><?php echo $qpaid; ?></td>
                            <td><?php echo $qpending; ?></td>
                            <td><?php echo $qmode; ?></td>
                            <td><?php echo $qdisc; ?></td>
                            <td><?php echo $qnotes; ?></td>
                            <td><?php echo $qtype ?></td>

<!--                             <td><?php echo $vemail; ?></td>
                            <td><?php echo $vaddress; ?></td> -->
                            <td><a href="UpdateQuatation.php?id=<?php echo $qid; ?>"><input type="Button" value="Update" name="" class="btn btn-primary" id="btn"></a><a href="Deleteinward.php?id=<?php echo $qid; ?>"><input type="Button" value="Delete" name="" class="btn btn-primary" id="btn"></a></td>                  
                        </tr>
                                              <?php } ?>
                       <?php
                       /*
                             
                              $res=mysqli_query($conn,$q) or die("Can't Execute Query...");
                               $count=1;
                               while($row=mysqli_fetch_assoc($res))
                               {
                              ?>
                           <tr>
                               <td><?php echo $row['InwardDate']; ?></td>
                               <td><?php echo $row['VendorId']; ?></td>
                               <td><?php echo $row['TotalGST']; ?></td>
                               <td><?php echo $row['Transport_extracost']; ?></td>
                               <td><?php echo $row['TotalAmount']; ?></td>
                               <td><?php echo $row['AmountPaid']; ?></td>
                               <td><?php echo $row['AmountPending']; ?></td>
                               <td><?php echo $row['PaymentMode']; ?></td>
                               <td><?php echo $row['TotalDiscount']; ?></td>
                               <td><?php echo $row['Notes']; ?></td>
                               <?php

                                    echo  '<td><a href="Update_Product.php?pid='.$row['InwardId'].'">Edit</a> / <a href="process_del_pro.php?pid='.$row['InwardId'].'">Delete</a>'
                                 */
                                    ?>

                               <?php/*
                               $count++;
                               }
                                */
                               ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      </section>
   </body>
   </html>