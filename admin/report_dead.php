<?php
error_reporting(0);
require_once('../assets/constants/config.php');
require_once('../assets/constants/check-login.php');
require_once('../assets/constants/fetch-my-info.php');

?>




<?php include('include/head.php'); ?>
<?php include('include/header.php'); ?>


<?php include('include/sidebar.php'); ?>


<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <!--  <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Data Tables</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tables</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                --> <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- ============================================================== -->
            <!-- data table  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Dead Stock Report </h4>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="validationCustom03">From Date</label>

                                    <input type="date" class="form-control " name="fromdate" required value="<?php $_POST['fromdate']; ?> ?>">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="validationCustom01">To Date</label>
                                    <input type="date" class="form-control " name="todate" required value="<?php echo $todate; ?>">
                                    <div class="valid-feedback" placeholder="User Id">
                                    </div>
                                </div>
                            

                                <center>

                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <label for="validationCustomUsername"></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            </div>

                                            <button class="btn btn-primary" type="submit" name="search">Search</button>
                                        </div>
                                    </div>
                                    <center>

                            </div>

                        </form>
                        <br />
                        <br />

                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        
                                        <th>Product Name</th>
                                            <th>Product Colour</th>
                                                   <th>Product Size</th>
                                        
                                        
                                        


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if (isset($_POST['search'])) {


// print_r($_POST);exit;
                                        $fromdate = $_POST['fromdate'];
                                        $todate = $_POST['todate'];
                                     


                                        $no=1;
                                        $sql = "SELECT * 
FROM dead_stock
WHERE added_date BETWEEN '" . $fromdate . "' AND '" . $todate . "' 
  AND sale = '0';";
                                    $no++;}else{
                                        
                                        $sql = "SELECT * FROM dead_stock
    WHERE  sale='0'";
                                        
                                    }

                                    ?>





                                    <?php


                                    $statement = $conn->prepare($sql);
                                    $statement->execute();
                                    $rec=$statement->fetchAll();

                                    foreach($rec as $item) {
                                       
                                    ?>

                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?php
                                    $stmt2 = $conn->prepare("SELECT * FROM `tbl_product` WHERE id=? AND delete_status='0'");
                                    $stmt2->execute([$item['product_id']]);
                                   // print_r($stmt2);exit;
                                    $record2 = $stmt2->fetch();
                                    echo $record2['name']; ?></td>
                                            
                                              <td><?php
                                    $stmt2 = $conn->prepare("SELECT * FROM `tbl_product` WHERE id=? AND delete_status='0'");
                                    $stmt2->execute([$item['product_id']]);
                                   // print_r($stmt2);exit;
                                    $record2 = $stmt2->fetch();
                                    echo $record2['color']; ?></td>
                                               <td><?php
                                    $stmt2 = $conn->prepare("SELECT * FROM `tbl_product` WHERE id=? AND delete_status='0'");
                                    $stmt2->execute([$item['product_id']]);
                                   // print_r($stmt2);exit;
                                    $record2 = $stmt2->fetch();
                                    echo $record2['color']; ?></td>
                                            
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                       <th>#</th>
                                     
                                        <th>Product Name</th>
                                            <th>Product Colour</th>
                                                   <th>Product Size</th>
                                       
                                        
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end data table  -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <?php include('include/footer.php'); ?>
    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
</div>
</div>
<!-- ============================================================== -->
<!-- end main wrapper -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->

<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<script src="assets/vendor/multi-select/js/jquery.multi-select.js"></script>
<script src="assets/libs/js/main-js.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="assets/vendor/datatables/js/data-table.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>


</body>

</html>