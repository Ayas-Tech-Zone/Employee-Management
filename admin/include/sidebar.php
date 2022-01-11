<?php
   //error_reporting(0);
   require_once('../assets/constants/config.php');
   require_once('../assets/constants/check-login.php');
   require_once('../assets/constants/fetch-my-info.php');
   
   $stmt = $conn->prepare("SELECT * FROM admin WHERE id='" . $_SESSION['id'] . "'");
   $stmt->execute();
   $admin = $stmt->fetch(PDO::FETCH_ASSOC);
   
   $stmt = $conn->prepare("SELECT * FROM `permission_role` WHERE group_id='" . $admin['role_id'] . "'");
   $stmt->execute();
   $roles = $stmt->fetchAll();
   $setroles = array();
   foreach ($roles as $role) {
       $stmt = $conn->prepare("SELECT * FROM `permissions` WHERE id='" . $role['permission_id'] . "'");
       $stmt->execute();
       $per = $stmt->fetchAll();
       array_push($setroles, $per[0]['name']);
   }
   //print_r($setroles);
   $_SESSION['userroles'] = $setroles;
   $userroles = $_SESSION['userroles'];
   
   //echo$admin['role'];
   ?>
<?php if ($admin['admin_user'] == '1') { ?>
<div class="nav-left-sidebar sidebar-dark">
   <div class="menu-list">
      <nav class="navbar navbar-expand-lg navbar-light">
         <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav flex-column">
               <li class="nav-divider">
                  Menu
               </li>
               <li class="nav-item ">
                  <a class="nav-link active" href="index.php"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
               </li>
               
               
               
            
               
               
               
               
              
                
               <li class="nav-item ">
                  <a class="nav-link " href="View_user.php"><i class="fa fa-user-plus
                     "></i>Employee Management<span class="badge badge-success">6</span></a>
               </li>
               
            
                
               <li class="nav-item ">
                  <a class="nav-link " href="View_Role.php"><i class="fa fa-credit-card
                     "></i>Role  Management<span class="badge badge-success">6</span></a>
               </li>
               
              
               
            
               
               
            
            
           
              
      
              
               
                 <li class="nav-item ">
                  <a class="nav-link " href="view_borrow.php"><i class="mdi mdi-google-wallet
                     "></i>Borrow  Management<span class="badge badge-success">6</span></a>
               </li>
               
               
               
                 <li class="nav-item ">
                  <a class="nav-link " href="view_leaves.php"><i class="mdi mdi-calendar
                     "></i>Leaves  Management<span class="badge badge-success">6</span></a>
               </li>
               
               
               <li class="nav-item ">
                  <a class="nav-link " href="view_salary.php"><i class="fa fa-credit-card
                     "></i>Salary  Management<span class="badge badge-success">6</span></a>
               </li>
             
                <li class="nav-item">
                  <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fas fa-file-alt
                     "></i>Report</a>
                  <div id="submenu-4" class="collapse submenu" style="">
                     <ul class="nav flex-column">
                        <li class="nav-item">
                           <a class="nav-link" href="report_inc.php">New Employee</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="borror_report.php"> Borrow  Report</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="app_report.php">Leave Approval Report</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="rem_leave.php">Pending Leaves Report</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="salary_slip_report.php">Salary Slip</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="salary_report.php">Salary Disbursement  Report
                           </a>
                        </li>
                       
                      
                       
                       
                     </ul>
                  </div>
               </li>
              
             
             
               <li class="nav-item ">
                  <a class="nav-link " href="https://mayurik.com"><i class="fas fa-user"></i>About Author<span class="badge badge-success">6</span></a>
               </li>
               <li class="nav-item ">
                  <a class="nav-link " href="backup/backups.php"><i class="fab fa-stack-exchange"></i>Backup Database<span class="badge badge-success">6</span></a>
               </li>
               <li class="nav-item ">
                  <a class="nav-link " href="../logout.php"><i class="fas fa-lock"></i>Logout<span class="badge badge-success">6</span></a>
               </li>
            </ul>
         </div>
      </nav>
   </div>
</div>
<?php } ?>








<?php if ($admin['admin_user'] == '0') { ?>
<div class="nav-left-sidebar sidebar-dark">
   <div class="menu-list">
      <nav class="navbar navbar-expand-lg navbar-light">
         <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav flex-column">
               <li class="nav-divider">
                  Menu
               </li>
               <li class="nav-item ">
                  <a class="nav-link active" href="index.php"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
               </li>
               
               
               
            
               
               
               
                <?php if (isset($userroles)) {
                           if (in_array('User', $userroles) || in_array('User', $userroles)) { ?>
              
                
               <li class="nav-item ">
                  <a class="nav-link " href="View_user.php"><i class="fa fa-user-plus
                     "></i>User Management<span class="badge badge-success">6</span></a>
               </li>
               <?php } }?>
            
                
                
                <?php if (isset($userroles)) {
                           if (in_array('Role', $userroles) || in_array('Role', $userroles)) { ?>
              
                
               <li class="nav-item ">
                  <a class="nav-link " href="View_Role.php"><i class="fa fa-credit-card
                     "></i>Role  Management<span class="badge badge-success">6</span></a>
               </li>
               
              <?php } }?>
               
            
               
               
            
            
           
              
      
               <?php if (isset($userroles)) {
                           if (in_array('Borrow', $userroles) || in_array('Borrow', $userroles)) { ?>
              
              
                 <li class="nav-item ">
                  <a class="nav-link " href="view_borrow.php"><i class="mdi mdi-google-wallet
                     "></i>Borrow  Management<span class="badge badge-success">6</span></a>
               </li>
                <?php } }?>
                <?php if (isset($userroles)) {
                           if (in_array('Leaves', $userroles) || in_array('Leaves', $userroles)) { ?>
              
               
                 <li class="nav-item ">
                  <a class="nav-link " href="view_leaves.php"><i class="mdi mdi-calendar
                     "></i>Leaves  Management<span class="badge badge-success">6</span></a>
               </li>
                <?php } }?>
                <?php if (isset($userroles)) {
                           if (in_array('Salary', $userroles) || in_array('Salary', $userroles)) { ?>
              
               <li class="nav-item ">
                  <a class="nav-link " href="view_salary.php"><i class="fa fa-credit-card
                     "></i>Salary  Management<span class="badge badge-success">6</span></a>
               </li>
                <?php } }?>
                
              <?php if (isset($userroles)) {
                           if (in_array('Reports', $userroles) || in_array('Reports', $userroles)) { ?>
              
                <li class="nav-item">
                  <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fas fa-file-alt
                     "></i>Report</a>
                  <div id="submenu-4" class="collapse submenu" style="">
                     <ul class="nav flex-column">
                        <li class="nav-item">
                           <a class="nav-link" href="report_inc.php">New Employee</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="borror_report.php"> Borrow  Report</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="app_report.php">Leave Approval Report</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="rem_leave.php">Pending Leaves Report</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="salary_slip_report.php">Salary Slip</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="salary_report.php">Salary Disbursement  Report
                           </a>
                        </li>
                       
                      
                       
                       
                     </ul>
                  </div>
               </li>
                <?php } } ?>
               <?php if (isset($userroles)) {
                           if (in_array('Settings', $userroles) || in_array('Settings', $userroles)) { ?>
              
               <li class="nav-item">
                  <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-sun"></i>Setting</a>
                  <div id="submenu-2" class="collapse submenu" style="">
                     <ul class="nav flex-column">
                        <li class="nav-item">
                           <a class="nav-link" href="manage_website.php"> <span class="badge badge-secondary">Manage Website</span></a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="manage_website.php">Manage Website</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="manage_email.php">Email Management</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="seo_setting.php">SEO Setting</a>
                        </li>
                     </ul>
                  </div>
               </li>
                <?php } }?>
              <?php if (isset($userroles)) {
                           if (in_array('Author', $userroles) || in_array('Author', $userroles)) { ?>
              
               <li class="nav-item ">
                  <a class="nav-link " href="author.php"><i class="fas fa-user"></i>About Author<span class="badge badge-success">6</span></a>
               </li>
               <?php } }?>
                <?php if (isset($userroles)) {
                           if (in_array('Backup Database', $userroles) || in_array('Backup Database', $userroles)) { ?>
              
              
               <li class="nav-item ">
                  <a class="nav-link " href="backup/backups.php"><i class="fab fa-stack-exchange"></i>Backup Database<span class="badge badge-success">6</span></a>
               </li>
               <?php } } ?>
               
               <li class="nav-item ">
                  <a class="nav-link " href="../logout.php"><i class="fas fa-lock"></i>Logout<span class="badge badge-success">6</span></a>
               </li>
            </ul>
         </div>
      </nav>
   </div>
</div>
<?php } ?>





