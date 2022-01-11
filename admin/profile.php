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
if(isset($_POST['update'])){
$target_dir = "../assets/uploadImage/Profile/";
  $website_logo = basename($_FILES["website_image"]["name"]);
  if($_FILES["website_image"]["tmp_name"]!=''){
    $image = $target_dir . basename($_FILES["website_image"]["name"]);
   if (move_uploaded_file($_FILES["website_image"]["tmp_name"], $image)) {
    
       @unlink("../assets/uploadImage/Profile/".$_POST['old_website_image']);
    
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
  }
  else {
     $website_logo =$_POST['old_website_image'];
  }


  
  $sql = "UPDATE admin SET fname=:fname,lname=:lname, email=:email,username=:username,gender=:gender, dob=:dob,contact=:contact, address=:address,image=:website_logo WHERE id='".$_SESSION['id']."'";
     $stmt = $conn->prepare($sql);
    $stmt->bindParam(':fname', $_POST['fname']);
  $stmt->bindParam(':lname', $_POST['lname']);
  $stmt->bindParam(':email', $_POST['email']);
  $stmt->bindParam(':username', $_POST['username']);
  $stmt->bindParam(':gender', $_POST['gender']);
  $stmt->bindParam(':dob', $_POST['dob']);
  $stmt->bindParam(':contact', $_POST['contact']);
  $stmt->bindParam(':address', $_POST['address']);
  $stmt->bindParam(':website_logo', $website_logo);

 
 $execute=$stmt->execute();
   
  if ($execute === TRUE) {
    //echo "<script>alert(' Profile Successfully Updated');</script>";
  
   
      $_SESSION['success']='Record Successfully Updated';
      ?>
      <div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p>Record Successfully Updated</p>
    <p>
    
     <?php echo "<script>setTimeout(\"location.href = 'profile.php';\",1500);</script>"; ?>
    </p>
  </div>
</div>
</div>
 
      <!-- <script type="text/javascript">
        window.location = "profile.php";
      </script>
       --><?php 

} else {
   
      //$_SESSION['error']='Something Went Wrong';
}
}
  ?>



            <?php include('include/head.php');?>
            <link rel="stylesheet" href="Operation/popup_style.css">

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
                            <h2 class="pageheader-title">Profile </h2>
                            <p class="pageheader-text">Profile</p>
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
                        <!-- validation form -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Profile</h5>
                                <div class="card-body">
                                   <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" id="add_brand">
                                                         <div class="row">
                                                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                          <div class="text-center">
                                              <img src="../assets/uploadImage/Profile/<?=$result['image']?>" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                              </div>
                                          </div>
                                          <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12">
                                              <div class="user-avatar-info">
                                                  <div class="m-b-20">
                                                      <div class="user-avatar-name">
                                                          <h2 class="mb-1"><?=$result['fname'];?>&nbsp;<?=$result['lname'];?></h2>
                                                      </div>
                                                       </div>
                                                  <!--  <div class="float-right"><a href="#" class="user-avatar-email text-secondary">www.henrybarbara.com</a></div> -->
                                                  <div class="user-avatar-address">
                                                      <div class="mt-3">
                                                        <!-- <image class="profile-img" src="../assets/uploadImage/Profile/<?=$result['image']?>" style="height:35%;width:25%;">
                 -->  <input type="hidden" value="<?=$result['image']?>" name="old_website_image">
                          <input type="file" class="form-control" name="website_image" accept="image/jpeg/png" >

                                                              </div>
                                                  </div>
                                              </div>
                                        <br/>
                                           <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">First Name</label>
                                                 <input type="text" class="form-control " name="fname" value="<?=$result['fname']?>" required pattern="^[a-z A-Z]+$">
                                               <div class="invalid-feedback">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">Last Name</label>
                                                 <input type="text" class="form-control" name="lname" value="<?=$result['lname']?>" required pattern="^[a-z A-Z]+$">
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                            


                                           
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                               <label for="validationCustom02">Email</label>
                                                <input type="text" class="form-control" name="email" value="<?=$result['email']?>" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
>
                                                 <div class="valid-feedback">
                                                </div>
                                            </div>
                                            
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                               <label for="validationCustom01">Gender</label>
                                                <select type="text" class="form-control" placeholder="" name="gender"  required=""  value="<?=$result['dob']?>">
                                       
                                                     <option value="Male">Male</option>
                                                      <option value="Female">Female</option>
                                                       </select>
                                                  <div class="valid-feedback">
                                                </div>
                                            </div>
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                               <label for="validationCustom02">Mob No</label>
                                                <input type="text" class="form-control" name="contact" value="<?=$result['contact']?>" required minlength="10" maxlength="10" required pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$"
>
                                                <div class="valid-feedback">
                                                </div>
                                            </div>
                                            
                                            
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                               <label for="validationCustomUsername">Username</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    </div>
                                                    <input type="text" class="form-control " name="username" value="<?=$result['username']?>" required>
                                                 <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom02">Address</label>
                                                <textarea type="text" class="form-control " name="address" required><?=$result['address']?>
                                                      </textarea>
                                                     <div class="valid-feedback">
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <!-- <label for="validationCustom02">Upload Profile</label>
                                                <image class="profile-img" src="../assets/uploadImage/Profile/<?=$result['image']?>" style="height:35%;width:25%;">
                  <input type="hidden" value="<?=$result['image']?>" name="old_website_image">
                          <input type="file" class="form-control" name="website_image" accept="image/jpeg/png" > -->
                                 <div class="valid-feedback" >
                                                </div>
                                            </div>
                                            

                                        </div>
                                        <br>
                                      </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                                             <center>

                                                <button class="btn btn-primary" type="submit" name="update" onclick="addBrand()">Update </button>
                                              </center>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end validation form -->
                        <!-- ============================================================== -->
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
                       </div>

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


 <style>.error {
    color: red !important;
    
}</style>
<script src="../assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- ... (your existing HTML code) ... -->

<script>
   function addBrand(){
     jQuery.validator.addMethod("alphanumeric", function (value, element) {
        // Check if the value is empty
        if (value.trim() === "") {
            return false;
        }
        // Check if the value contains at least one alphabet character
        if (!/[a-zA-Z]/.test(value)) {
            return false;
        }
        // Check if the value contains only alphanumeric characters, spaces, and allowed special characters
        return /^[a-zA-Z0-9\s!@#$%^&*()_-]+$/.test(value);
    }, "Please enter alphanumeric characters with at least one alphabet character.");
     
      jQuery.validator.addMethod("lettersonly", function(value, element) {
   // Check if the value is empty
   if (value.trim() === "") {
    return false;
   }
   return /^[a-zA-Z\s]*$/.test(value);
   }, "Please enter alphabet characters only");

      jQuery.validator.addMethod("noSpacesOnly", function (value, element) {
    // Check if the input contains only spaces
    return value.trim() !== '';
}, "Please enter a non-empty value");

   $('#add_brand').validate({
    rules: {
        fname: {
        required: true,
        alphanumeric: true,
        noSpacesOnly: true
         },
         lname: {
        required: true,
        alphanumeric: true,
        noSpacesOnly: true
         },
         email: {
        required: true,
        noSpacesOnly: true   
        
       
         },
         contact: {
          required: true,
          digits: true,
          minlength: 10,
          maxlength: 10
        },
      username: {
        required: true
      },
      contact: {
        required: true
      },
      address: {
        required: true
      }
    },
    messages: {
      fname: {
        required: "Please enter a fname.",
        pattern: "Only alphanumeric characters are allowed."
      },
      lname: {
         required: "Please enter status."
      },
      email: {
         required: "Please enter status."
      },
      contact: {
         required: "Please enter contact."
      },
      username: {
         required: "Please enter username."
      },
      address: {
         required: "Please enter address."
      }
      

    },
   });
   };
</script>
</body>
 
</html>