<?php include('include/head.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php
error_reporting(0);
require_once('../assets/constants/config.php');
require_once('../assets/constants/check-login.php');
require_once('../assets/constants/fetch-my-info.php');

$stmt = $conn->prepare("SELECT * FROM admin WHERE id=? and delete_status='0'");
$stmt->execute([$_POST['id']]);
$result = $stmt->fetchAll();
?>

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Add Leaves</h5>
                    <div class="card-body">
                        <form class="form-horizontal" action="Operation/leaves.php" method="post" enctype="multipart/form-data" id="add_brand">
                            <div class="form-row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                        <label for="validationCustom03">Name</label>
                                        <select class="form-control" name="fname" required>
                                            <option value="">Select Name</option>
                                            <?php $stmt = $conn->prepare("SELECT * FROM `admin` WHERE delete_status='0' AND admin_user!='1'");
                      $stmt->execute();
                      $record = $stmt->fetchAll();

                      foreach ($record as $res) { ?>

                        <option value="<?php echo $res['id'] ?>">
                        <?php echo $res['fname'];?>  <?php echo $res['lname'];
                      } ?>
                        </option>
                                          >
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                               
                                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                            <label for="validationCustom02"> Month</label>
                                    
                                              <?php $date=date('F');
                                                 ?>
                                            <input type="text" class="form-control"  name="month" id="month" value="<?php echo $date; ?>" readonly />
                                            
                                            
                                            <div class="valid-feedback"></div>
                                        </div>


                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="validationCustom02"> Year</label>
                               
                                    
                                      <?php $ydate=date('Y');
                                                 ?>
                                            <input type="text"  class="form-control"  name="year" id="year" value="<?php echo $ydate; ?>" readonly/>
                                    <div class="valid-feedback"></div>
                                </div>

                            



                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="validationCustom02">Leave Date</label>
                                    <input type="date" name="date" id="date" class="form-control mb-1" placeholder="Borrow Amount" >
                                    <div class="valid-feedback"></div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="validationCustom02">Type Of Leave</label>
                                    <select name="l_type"  class="form-control mb-1" minlength="5" maxlength="15" required placeholder="Actual Salary">
                                        <option>Select Leave Type</option>
                                        <option value="1">Paid Leave </option>
                                        <option value="2">Unpaid Leave </option>
                                        </select>
                                    <div class="valid-feedback"></div>
                                    <span id="password-strength"></span>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="validationCustom02">Pending Leaves</label>
                                    <input type="text" name="total" id="lev" class="form-control mb-1 " minlength="5" maxlength="15" required placeholder="Paid Salary" readonly>
                                    <div class="valid-feedback"></div>
                                    <span id="password-strength"></span>
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
<!-- for salary  -->
$(document).ready(function() {
    // Month name to number mapping
    const monthMap = {
        'January': 1,
        'February': 2,
        'March': 3,
        'April': 4,
        'May': 5,
        'June': 6,
        'July': 7,
        'August': 8,
        'September': 9,
        'October': 10,
        'November': 11,
        'December': 12
    };

// Fetch salary and borrow amount based on selected fname
$('select[name="fname"]').change(function() {
    var userId = $(this).val();
    if (userId) {
        $.ajax({
            type: 'POST',
            url: 'fetchleave.php',
            data: { id: userId },
            success: function(response) {
                var data;
                try {
                    data = JSON.parse(response); // Parse the response
                } catch (e) {
                    console.error('Invalid JSON response:', response);
                    return;
                }
                
                if (data && data.count !== undefined) {
                    $('#lev').val(data.count); // Set the leave count in #lev
                } else {
                    console.error('Invalid data format:', data);
                    $('#lev').val(''); // Clear the field if the response is invalid
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', status, error);
            }
        });
    } else {
        $('#lev').val(''); // Clear the field if no user is selected
    }
});

    
    
    

    // Fetch borrow amount based on selected fname, month, and year
    function fetchAmount() {
        var monthId = $('input[name="month"]').val();  
        var yearId = $('input[name="year"]').val(); 
        var emp = $('select[name="fname"]').val();
        if (emp) { // Fetch based on selected fname
            $.ajax({
                type: 'POST',
                url: 'fetch_amount.php',
                data: { month_id: monthId, year_id: yearId, emp: emp },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data && data.amount) {
                        $('#amount').val(data.amount);
                    } else {
                        $('#amount').val('');
                    }
                    calculateTotal(); // Recalculate total after fetching amount
                }
            });
        } else {
            $('#amount').val('');
            calculateTotal(); // Recalculate total if fname is not selected
        }
    }

    // Function to calculate total salary
    function calculateTotal() {
        var perDaySalary = parseFloat($('#actual').val()) || 0; // Get per-day salary
        var selectedMonth = $('input[name="month"]').val(); // Get month name
        var yearId = parseInt($('input[name="year"]').val(), 10); // Convert to integer
        var leaveDays = parseInt($('#leave').val(), 10) || 0; // Get leave days, default to 0

        if (selectedMonth && yearId) {
            var monthId = monthMap[selectedMonth]; // Get numeric month from mapping
            var daysInMonth = new Date(yearId, monthId, 0).getDate(); // Get days in selected month
            
            var totalSalary = perDaySalary * daysInMonth; // Calculate total based on per-day salary
            var borrowAmount = parseFloat($('#amount').val()) || 0; // Get borrow amount
            var leaveDeduction = leaveDays * perDaySalary; // Calculate deduction based on leave days
            
            // Calculate final total
            var finalTotal = totalSalary + borrowAmount - leaveDeduction; 
            $('#final').val(finalTotal); // Update Paid Salary field with the total
        } else {
            $('#final').val(0); // Reset total if month or year is not selected
        }
    }

    // Trigger total calculation when leave input changes
    $('#leave').on('input', calculateTotal); // Recalculate when leave days are entered
});
</script>





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
