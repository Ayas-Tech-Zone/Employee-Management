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
                        <h4>Pending Leave Report </h4>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="form-row">
                             


                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
    <label for="validationCustom01">Select Employee</label>
    <select name="emp" class="form-control">
        <option value="">Select</option>
        <?php 
        $stmt = $conn->prepare("SELECT * FROM `admin` WHERE delete_status='0' AND role_id!='0'");
        $stmt->execute();
        $record = $stmt->fetchAll();

        foreach ($record as $res) { ?>
            <option value="<?php echo $res['id']; ?>">
                <?php echo $res['fname'] . ' ' . $res['lname']; ?>
            </option>
        <?php } ?>
    </select>
    <div class="valid-feedback" placeholder="User Id"></div>
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
                                                                               
                                        <th>Employee Name</th>
                                           <th>Total Leaves</th>
                                              <th>Pending Leave</th>
                                        
                                         
                                        
                                        


                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
if (isset($_POST['search'])) {
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];

    $sql = "SELECT * FROM `admin` WHERE delete_status='0' AND id=?";
    $statement = $conn->prepare($sql);
    $statement->execute([$_POST['emp']]);
} else {
    $sql = "SELECT * FROM `admin` WHERE delete_status='0'";
    $statement = $conn->prepare($sql);
    $statement->execute();
}

$i = 1;
$rec = $statement->fetchAll();

foreach ($rec as $key) {
    // Fetch the leave count for each user
    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM leaves WHERE delete_status='0' AND user=? GROUP BY user");
    $stmt->execute([$key['id']]);
    $recrr = $stmt->fetch(); // Use fetch() to get a single row

    // Check if there's a count, otherwise default to 0
    if ($recrr) {
        $cou = $recrr['count'];
    } else {
        $cou = 0;
    }

    // Calculate the final value
    $final =  $key['leavess']-$cou ;
?>

<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $key['fname']; ?></td>
    <td><?php echo $key['leavess']; ?></td>
    <td><?php echo $final; ?></td>
</tr>

<?php
    $i++;
}
?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                                                               
                                        <th>Employee Name</th>
                                           <th>Total Leaves</th>
                                              <th>Pending Leave</th>
                                        
                                        
                                        
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