
<?php
error_reporting(0);
require_once('../assets/constants/config.php');
require_once('../assets/constants/check-login.php');
require_once('../assets/constants/fetch-my-info.php');

?>

<?php
if(isset($_POST['update'])){


  $passw = hash('sha256', $_POST['password']);
//$passw = hash('sha256',$p);
//echo $passw;exit;
function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
$pass = hash('sha256', $salt . $passw);

  $sql = "UPDATE admin SET password=:password where id='".$_SESSION['id']."'";
     $stmt = $conn->prepare($sql);
    $stmt->bindParam(':password',$pass);
 
$execute=$stmt->execute();




 if ($execute === TRUE) {
    echo "<script>alert(' Password Updated Successfully');</script>";
  
   
      $_SESSION['success']='Record Successfully Updated';
      ?>
      <script type="text/javascript">
        window.location = "change_pass.php";
      </script>
      <?php 

} else {
   echo "<script>alert(' Something Went Wrong');</script>";
  
   
      //$_SESSION['error']='Something Went Wrong';
} }
  ?>


            <?php include('include/head.php');?>
            <?php include('include/header.php');?>
                        <?php include('include/sidebar.php');?>
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Change Password </h2>
                            <p class="pageheader-text">Change Password</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                       <!--  <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Form Validations</li>
                                  -->   </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
             
                  <div class="row">
                        <!-- ============================================================== -->
                        <!-- valifation types -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Change Password </h5>
                                <div class="card-body">
                                     <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                       <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">New Password</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="password" class="form-control" name="password" placeholder="Enter new password" required="">
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Confirm Password</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                               <input type="password" class="form-control" name="password" placeholder="Confirm new password" required="">
                                       </div>
                                        </div>
                                        <div class="form-group row text-center">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">

                                                <button type="submit" class="btn btn-space btn-primary " type="submit" name="update">Update</button>
                                                 </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end valifation types -->
                        <!-- ============================================================== -->
                    </div>
           
            </div>
        

        <!-- ============================================================== -->
        <!-- end navsidebar -->
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
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
</body>
 
</html>