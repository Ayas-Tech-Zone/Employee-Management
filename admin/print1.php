 <?php
//error_reporting(0);
require_once('../assets/constants/config.php');
require_once('../assets/constants/check-login.php');
require_once('../assets/constants/fetch-my-info.php');

?>

<?php 

    
$stmt = $conn->prepare("SELECT * FROM admin WHERE id='".$_SESSION['id']."'");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>
 
 <?php 
  $sql = "SELECT * FROM tbl_invoice where  id='".$_GET['id']."'";
 
                
 $statement = $conn->prepare($sql);
 $statement->execute();
$invoice = $statement->fetch(PDO::FETCH_ASSOC);?>
 
 
 <?php include('include/head.php');?>

            <?php include('include/header.php');?>
                        <?php include('include/sidebar.php');?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <!--<div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title"> Product Invoice </h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">E-coommerce</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">E-Commerce Product Invoice</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    --><!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header p-4">
<!--                                     <a class="pt-2 d-inline-block" href="index.html">Concept</a>
-->                                   
                                    <div class="float-right"> <h3 class="mb-0">Invoice #<?= $invoice['inv_no']; ?></h3>
                                    Date:  <?= $invoice['build_date']; ?></div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <h5 class="mb-3">From:</h5>                                            
                                            <h3 class="text-dark mb-1"><?=$result['fname'];?>&nbsp;<?=$result['lname'];?></h3>
                                         
                                            <div><?=$result['address']?></div>
                                            <div>Email: <?=$result['email']?></div>
                                            <div>Phone: <?=$result['contact']?></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h5 class="mb-3">To:</h5>
                                            <h3 class="text-dark mb-1"><?= $invoice['customer_id']; ?></h3>                                            
                                            <div><?= $invoice['c_address']; ?></div>
<!--                                            <div>Canal Winchester, OH 43110</div>
-->                                            <div>Email: <?= $invoice['c_email']; ?></div>
                                            <div>Phone: <?= $invoice['customer_no']; ?></div>
                                        </div>
                                    </div>
                                    <div class="table-responsive-sm">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="center">#</th>
                                                    <th>Item</th>
                                                    <th>Description</th>
                                                    <th class="right">Unit Cost</th>
                                                    <th class="center">Qty</th>
                                                    <th class="right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $sql2 = "SELECT * FROM quot_inv_items where inv_id='".$_GET['id']."'";
 
                
                                                 $statement2 = $conn->prepare($sql2);
                                                 $statement2->execute();
                                                     while($row2= $statement2->fetch(PDO::FETCH_ASSOC))
                                                     {
                                                
                                                           $sql1 = "SELECT * FROM tbl_product where id='".$row2['product_id']."'";
                                                 
                                                                
                                                 $statement1 = $conn->prepare($sql1);
                                                 $statement1->execute();
                                                     $row1 = $statement1->fetch(PDO::FETCH_ASSOC);
                                                
                                                 
                                                        $no +=1;
                                                ?>
                                                <tr>
                                                    <td class="center"><?=$no?></td>
                                                    <td class="left strong"><?=$row1['name']?></td>
                                                    <td class="left"><?=$row1['details']?></td>
                                                    <td class="right"><?=$row2['rate']?></td>
                                                    <td class="center"><?=$row2['quantity']?></td>
                                                    <td class="right"><?=$row2['total']?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-5">
                                        </div>
                                        <div class="col-lg-4 col-sm-5 ml-auto">
                                            <table class="table table-clear">
                                                <tbody>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">Subtotal</strong>
                                                        </td>
                                                        <td class="right"><?=$invoice['subtotal']?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">Discount (<?=$invoice['discount']?>%)</strong>
                                                        </td>
                                                        <td class="right"><?php
                                                        echo $discount=$invoice['subtotal']*($invoice['discount']/100);
                                                        ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">GST (<?=$invoice['gst_rate']?>%)</strong>
                                                        </td>
                                                        <td class="right"><?php
                                                        $gst_rate=($invoice['subtotal']-$discount)*($invoice['gst_rate']/100);
                                                        echo number_format($gst_rate,2);
                                                        ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">Total</strong>
                                                        </td>
                                                        <td class="right">
                                                            <strong class="text-dark"><?=$invoice['final_total']?></strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <p class="mb-0">2983 Glenview Drive Corpus Christi, TX 78476</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <?php include('include/footer.php');?>
         <!-- ============================================================== -->
                <!-- end footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- end wrapper  -->
            <!-- ============================================================== -->
        </div>
    </div>
        <!-- ============================================================== -->
        <!-- end main wrapper  -->
        <!-- ============================================================== -->
        <!-- Optional JavaScript -->
        <!-- jquery 3.3.1 -->
        <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
        <!-- bootstap bundle js -->
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <!-- slimscroll js -->
        <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
        <!-- main js -->
        <script src="assets/libs/js/main-js.js"></script>
</body>
 
</html>