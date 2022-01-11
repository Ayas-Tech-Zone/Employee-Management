<?php include('include/head.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php
error_reporting(0);
require_once('../assets/constants/config.php');
require_once('../assets/constants/check-login.php');
require_once('../assets/constants/fetch-my-info.php');

$stmt = $conn->prepare("SELECT * FROM groups WHERE name != 'admin' and delete_status='0'");
$stmt->execute();
$result = $stmt->fetchAll();
?>

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Add User</h5>
                    <div class="card-body">
                        <form class="form-horizontal" action="Operation/User.php" method="post" enctype="multipart/form-data" id="add_brand">
                            <div class="form-row">
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="validationCustom03">First name</label>
                                    <input type="text" class="form-control " name="fname" required pattern="^[a-zA-Z]+$" placeholder="Enter First Name">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="validationCustom04">Last name</label>
                                    <input type="text" class="form-control" name="lname" required pattern="^[a-zA-Z]+$" placeholder="Enter Last Name">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="validationCustom02">Email</label>
                                    <input type="email" class="form-control" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Enter Email Id">
                                    <div class="valid-feedback"></div>
                                </div>
<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
    <label for="validationCustom02">Password</label>
    <input type="text" name="password" id="newpassword" class="form-control mb-1" minlength="5" maxlength="15" required placeholder="Enter Password">
    <div class="valid-feedback"></div>
</div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="validationCustom01">Role</label>
                                    <select class="form-control" name="group_id" required>
                                        <?php foreach ($result as $value) { ?>
                                            <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="valid-feedback"></div>
                                </div>
                          
                            

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="validationCustom02">Salary Per Day</label>
                                    <input type="text" class="form-control" name="salary" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Enter Salary">
                                    <div class="valid-feedback"></div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="validationCustom02">Leaves allowed per month</label>
                                    <input type="text" class="form-control" name="leave" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Enter Leaves">
                                    <div class="valid-feedback"></div>
                                </div>

                                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="validationCustom02">Joinning Date</label>
                                    <input type="date" class="form-control" name="jdate" required  >
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>
                            <br>
                            <center>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <button class="btn btn-primary" type="submit" name="btn_save">Submit</button>
                                </div>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('include/footer.php'); ?>
</div>
<!-- Optional JavaScript -->
<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<script src="assets/libs/js/main-js.js"></script>
<script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
<script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
<script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
<script src="assets/vendor/charts/morris-bundle/morris.js"></script>
<script src="assets/vendor/charts/c3charts/c3.min.js"></script>
<script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
<script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
<script src="assets/libs/js/dashboard-ecommerce.js"></script>
<script>
    document.getElementById("newpassword").addEventListener("input", checkPasswordStrength);

    function checkPasswordStrength() {
        var password = document.getElementById("newpassword").value;
        var strengthText = document.getElementById("password-strength");

        var passwordLength = password.length;
        var strengthLabel = "";

        if (passwordLength >= 8 && passwordLength <= 10) {
            strengthLabel = "Medium";
            strengthText.style.color = "orange";
        } else if (passwordLength > 10) {
            strengthLabel = "Strong";
            strengthText.style.color = "green";
        } else {
            strengthLabel = "Weak";
            strengthText.style.color = "red";
        }

        strengthText.innerHTML = strengthLabel;
    }

    document.getElementById("designation").addEventListener("change", function() {
        var incentiveBox = document.getElementById("incentive-box");
        if (this.value == "1") {
            incentiveBox.style.display = "block";
        } else {
            incentiveBox.style.display = "none";
        }
    });

    function addBrand() {
        jQuery.validator.addMethod("alphanumeric", function(value, element) {
            if (value.trim() === "") {
                return false;
            }
            if (!/[a-zA-Z]/.test(value)) {
                return false;
            }
            return /^[a-zA-Z0-9\s!@#$%^&*()_-]+$/.test(value);
        }, "Please enter alphanumeric characters with at least one alphabet character.");

        jQuery.validator.addMethod("validEmail", function(value, element) {
            return this.optional(element) || /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
        }, "Please enter a valid email address.");

        jQuery.validator.addMethod("lettersonly", function(value, element) {
            if (value.trim() === "") {
                return false;
            }
            return /^[a-zA-Z\s]*$/.test(value);
        }, "Please enter alphabet characters only");

        $.validator.addMethod("noDigits", function(value, element) {
            return this.optional(element) || !/\d/.test(value);
        }, "Please enter a without digits.");

        jQuery.validator.addMethod("noSpacesOnly", function(value, element) {
            return value.trim() !== '';
        }, "Please enter a non-empty value");

        $('#add_brand').validate({
            rules: {
                fname: {
                    required: true,
                    noSpacesOnly: true,
                    alphanumeric: true,
                    noDigits: true,
                },
                lname: {
                    required: true,
                    noSpacesOnly: true,
                    noDigits: true,
                    alphanumeric: true
                },
                email: {
                    required: true,
                    noSpacesOnly: true,
                    validEmail: true
                }
            },
            messages: {
                fname: {
                    required: "Please enter a first name.",
                    pattern: "Only alphanumeric characters are allowed.",
                    alphanumeric: "Only alphanumeric characters are allowed."
                },
                lname: {
                    required: "Please enter a last name.",
                    pattern: "Only alphanumeric characters are allowed.",
                    alphanumeric: "Only alphanumeric characters are allowed."
                },
                email: {
                    required: "Please enter email.",
                }
            },
        });
    }
</script>

<script>
$(document).ready(function() {
    // Function to generate random password
    function generateRandomPassword(length) {
        var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$!";
        var password = "";
        for (var i = 0, n = charset.length; i < length; ++i) {
            password += charset.charAt(Math.floor(Math.random() * n));
        }
        return password;
    }

    // Generate and set password when the page loads
    function setRandomPassword() {
        var randomPassword = generateRandomPassword(10); // Set desired password length
        $('#newpassword').val(randomPassword); // Set password in the input field
    }

    // Automatically generate password when page loads
    setRandomPassword();

    // Optionally, regenerate password when the user focuses on the password field
    $('#newpassword').on('focus', function() {
        setRandomPassword(); // Regenerate password when field is focused (optional)
    });
});


</script>
