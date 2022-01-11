<?php
//echo  "SELECT * FROM tbl_invoice WHERE id='".$_GET['id']."'";
include('../assets/constants/config.php');
require_once('../assets/constants/check-login.php');
require_once('../assets/constants/fetch-my-info.php');

$stmt = $conn->prepare("SELECT * FROM tbl_invoice WHERE id='".$_POST['id']."'");
$stmt->execute();
//echo print_r($stmt);exit;
$product = $stmt->fetch(PDO::FETCH_ASSOC);

 
//echo print_r($product);exit;
?>

<?php include('include/head.php');?>
<link href="assets/vendor/select2/css/select2.css" rel="stylesheet" />
            <?php include('include/header.php');?>
            <?php include('include/sidebar.php');?>
             
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <!-- <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Candidate </h2>
                            <p class="pageheader-text">Candidate</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Form Validations</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                 --><!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                   <div class="row">
                    
                        <!-- ============================================================== -->
                        <!-- validation form -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Paid Installment</h5>
                                <div class="card-body">
                                   <form class="form-horizontal" action="Operation/Order.php" method="post" enctype="multipart/form-data" id="enquiry_pop">

                                    <input type="hidden" class="form-control " name="id"  value="<?=$product['id'];?>">

                                

                                           <div class="form-row">
                              <div class="form-group row col-md-6 mb-2">
                                                <label class="col-sm-3 control-label">Customer Name:</label>
                                                <div class="col-sm-9">
                                                <?php
                                    $stmt2 = $conn->prepare("SELECT * FROM `customer` WHERE id=? AND delete_status='0'");
                                    $stmt2->execute([$product['customer_id']]);
                                   // print_r($stmt2);exit;
                                    $record2 = $stmt2->fetch();
                                     ?>

                                                   <input type="text" name="customer_id" value="<?php echo $record2['name'];?>" class="form-control"  required readonly>
                                                </div>
                                        </div>

                                      &nbsp;&nbsp;&nbsp;&nbsp;


                                     

                                      &nbsp;&nbsp;&nbsp;&nbsp;


                                      <?php   $current_date=date('Y-m-d');?>

                                        <div class="form-group row col-md-6 mb-2">
                                                <label class="col-sm-3 control-label"> Date</label>
                                                <div class="col-sm-9">
                                                   <input type="date" name="build_date" class="form-control " value="<?php echo $product['build_date'];?>" data-provide="datepicker" required readonly>
                                                   </div>
                                        </div>
                                                                              &nbsp;&nbsp;&nbsp;&nbsp;
 
                                        <div class="form-group row col-md-6 mb-2">
                                                <label class="col-sm-3 control-label">Customer No: </label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="customer_no" class="form-control "  value="<?php echo $product['customer_no'];?>" placeholder="Customer No" minlength="10" maxlength="10" pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$" required readonly>

                                                   
                                                    </div>
                                        </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <div class="form-group row col-md-6 mb-2">
                                                <label class="col-sm-3 control-label">Invoice No:</label>
                                                <div class="col-sm-9">
                                                  <?php $user = "select count(*) as cnt from tbl_invoice";
                                                 $statement = $conn->prepare($user);
                                                  $statement->execute();
                                                $row = $statement->fetch(PDO::FETCH_ASSOC);
                                                $new=10000+$row['cnt']+1;
                                                ?>
                                                 <input type="text" value="<?php echo $product['inv_no'];?>" name="inv_no" value="<?php echo sprintf('%04d',intval($new)) ?>"  class="form-control" required readonly>
                                                </div>
                                        </div>

                                         &nbsp;&nbsp;&nbsp;&nbsp;

                                        <div class="form-group row col-md-6 mb-2">
                                                <label class="col-sm-3 control-label">Customer Email: </label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="c_email" value="<?php echo $product['c_email'];?>" class="form-control "  placeholder="Customer Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" readonly>
                                                   
                                                    </div>
                                        </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <div class="form-group row col-md-6 mb-2">
                                                <label class="col-sm-3 control-label"> Address:</label>
                                                <div class="col-sm-9">
                                                 <textarea class="form-control" required name="c_address" style="height:70px;" placeholder="Customer Address" readonly><?php echo $product['c_address'];?></textarea>
                                                </div>
                                        </div>

                                        


                                    </div>
                                        
                                          
                                         
                                       
                                <input type="hidden" name="subtotal" id="subtotal" class="form-control" value="<?php echo $product['subtotal'];?>" placeholder="Subtotal" readonly="">

                              
                             <div class="form-group row mb-2">
                                  <label class="col-sm-6 control-label"> Final Total</label>
                                  <div class="col-sm-3">
                                      <input type="text" name="final_total" id="final_total" class="form-control" placeholder="Total" value="<?php echo $product['final_total'];?>" onblur="myFunction()" readonly="">
                                  </div>
                             </div>


                             

                            <div class="form-group row mb-2">
                                  <label class="col-sm-6 control-label"> Due Amount</label>
                                  <div class="col-sm-3">
                                      <input type="text" name="due_total" id="due_total" class="form-control" onblur="myFunction()" value="<?php echo $product['due_total'];?>" placeholder="Due Amount" readonly="">
                                  </div>
                             </div>
                             

                             <div class="form-group row mb-2">
                                  <label class="col-sm-6 control-label"> Installment Amount</label>
                                  <div class="col-sm-3">
                                      <input type="text" name="insta_amt" id="insta_amt" onblur="myFunction()" class="form-control"  placeholder="Installment Amount" >
                                  </div>
                             </div>
                             <div class="form-group row mb-2">
                                  <label class="col-sm-6 control-label"> Payment Method</label>
                                  <div class="col-sm-3">
                                        <select type="text" class="form-control" placeholder="" name="ptype"  required="" id="">
                                                    <option value="">--Select Payment Method--</option>
                                                    <?php
                                                    $sql = "SELECT * FROM tbl_payment where delete_status='0' ";
                                                    $statement = $conn->prepare($sql);
                                                    $statement->execute();
                                                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) { ?>  
                                                        <option value="<?php echo $row['payment_id'];?>"><?php echo $row['payment_method'];?></option>
                                                   <?php } ?>
                                                    
                                                    
                                                </select>
                                  </div>
                             </div>


                             <button type="submit" name="btn_edit" onclick="addenq()" class="btn btn-primary btn-flat m-b-30 m-t-30"  >Submit</button>
                                 <p id="GFG_DOWN" style="color: green;">

            </form>
                
        </div>
                    </div>
                    
        </div>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           <?php include('include/footer.php');?>
           
           
           
<script type="text/javascript">

  function addenq(){

  $('#enquiry_pop').validate({
      rules: {
        insta_amt: {
          required: true,
          digits: true
        },
        ptype: {
          required: true
        }
      },
      messages: {
        insta_amt: {
          required: "Please enter Installment",
          pattern: "Only numbers allowed"
        },
        ptype: {
          required: "Please Select Payment Type"
        
        }
        }
  });
};
</script>

           </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    
    <script type="text/javascript">1
 $('#class_id').change(function(){
    $("#subject_id").val('');
    $("#subject_id").children('option').hide();
    var class_id=$(this).val();
    $("#subject_id").children("option[data-id="+class_id+ "]").show();
    
  });
</script>
<script>
  $( function() {
    $( ".datepicker" ).datepicker({
      format: 'dd/mm/yyyy'
    });
  } );
</script>




<script>
function myFunction() {
  var x = document.getElementById("due_total");
  var y = document.getElementById("insta_amt");
var z=document.getElementById("due_total");
z.value = x.value-y.value;
//alert(z.value);
}
</script>                       
<script src="assets/vendor/select2/js/select2.min.js"></script>
</body>
 
</html>