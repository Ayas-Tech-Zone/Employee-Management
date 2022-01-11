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
                        <a href="add_leaves.php"><button class="btn btn-primary" type="submit" name=""> Add Leave</button></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SR No</th>
                                        <th>Name</th>
                                        
                                        <th>Leave Date</th>
                                           <th>Month</th>
                                       <th>Leave Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php
                                    $sql = "SELECT * FROM leaves where delete_status='0' ";


                                    $statement = $conn->prepare($sql);
                                    $statement->execute();
                                     $record4=$statement->fetchAll();
                                     foreach($record4 as $key)
                                     {

                                  

                                        $stmt = $conn->prepare("SELECT * FROM admin WHERE id=?");
                                        $stmt->execute([$key['user']]);
                                        $group = $stmt->fetch();
                        //   print_r($group);exit;


                                        $no += 1;
                                    ?>

                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?php echo $group['fname'] ;?>   <?php echo $group['lname'] ; ?></td>
                                            <td><?php echo $key['date']?></td>
                                                 <td><?php echo $key['month']?></td>
                                              <td><?php  if($key['type']=='1'){echo 'Paid Leave';}elseif($key['type']=='2'){ echo 'Unpaid Leave';} ?></td>
                                        
                                       <td>
    <?php 
    if ($key['status'] == '0') {
        echo '
        <button type="button" class="badge badge-danger" data-toggle="modal" data-target="#exampleModal' . $key['id'] . '">
        Not Approved
        </button>';
    } elseif ($key['status'] == '1') {
        echo '
        <button type="button" class="badge badge-info" data-toggle="modal" data-target="#exampleModal' . $key['id'] . '">
        Approved
        </button>';
    }
    ?>
</td>

                                          
                                           <div class="modal fade" id="exampleModal<?php echo $key['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="Operation/leaves.php">
            <input type="hidden"name="id" value="<?php echo $key['id'];?>">
               <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="validationCustom02">Status</label>
                                   <select name="status"  class="form-control">
                                    <option>Select</option>
                                    <option value="1">Approved</option>
                                    <option value="0">Not Approved</option>
                                   </select>
                                    <div class="valid-feedback"></div>
                                </div>

                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="validationCustom02">Remark</label>
                                    <input type="text" class="form-control" name="remark" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Enter Remark">
                                    <div class="valid-feedback"></div>
                                </div>





        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="change" class="btn btn-primary">Save changes</button>
      </div>
  </form>
    </div>
  </div>
</div>  
                                           
                                            <td>



                                                <a href="#"><button type="button" class="btn btn-danger cancel-button" onclick="return confirm('Do you really want to Delete ?') && delForm(event, <?php echo $key['id']; ?>, 'Operation/leaves.php')" id="<?= $id; ?>"><i class="fas fa-trash"></i></button></a>


                                                <!-- <a href="#" onclick="editForm(event,<?php echo $id; ?>, 'add_salary.php')" class="btn btn-info" title="Edit Event"><i class="fas fa-rupee"></i></a> -->





                                                <a href="#" onclick="editForm(event,<?php echo $key['id']; ?>, 'edit_leaves.php')" class="btn btn-info" title="Edit Event"><i class="fas fa-edit"></i></a>

                                            </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>SR No</th>
                                        <th>Name</th>
                                        
                                        <th>Leave Date</th>
                                       <th>Leave Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
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

<script>
    function editForm(event, id, file) {
        event.preventDefault(); // Prevent the default link behavior

        // Create a form dynamically
        var form = document.createElement('form');
        form.action = file;
        form.method = 'post';

        // Create a hidden input field for the ID
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'id';
        input.value = id;

        // Append the input field to the form
        form.appendChild(input);

        // Append the form to the body and submit it
        document.body.appendChild(form);
        form.submit();
    }
</script>


<script>
    function delForm(event, id, file) {
        event.preventDefault(); // Prevent the default link behavior

        // Create a form dynamically
        var form = document.createElement('form');
        form.action = file;
        form.method = 'post';

        // Create a hidden input field for the ID
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'del_id';
        input.value = id;

        // Append the input field to the form
        form.appendChild(input);

        // Append the form to the body and submit it
        document.body.appendChild(form);
        form.submit();
    }
</script>