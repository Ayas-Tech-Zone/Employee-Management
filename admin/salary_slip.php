
<?php 

include ('../assets/constants/config.php');
include ('../assets/constants/fetch-my-info.php');


// $sql="SELECT * from blog WHERE delete_status=0";
//     $stmt6 = $conn->prepare($sql);
//     //echo print_r($stmt4);exit;
//     $stmt6->execute();

    ?>

<style>
    table{
        border: 1px solid;
        border-collapse: collapse;
        width: 100%;
    }
    td, th{
      border: 1px solid #dddddd;
      padding: 8px;
    }
    #table2{
        border: 3px solid;
        margin-top: 20px;
    }
    #table2 td, th{
        border: 2px solid;
    }
</style>



<?php
// if(isset($_POST['submit'])){
 
  $sql = "SELECT * FROM salary where `id`=?";
 
                
 $statement = $conn->prepare($sql);
 $statement->execute([$_POST['id']]);
  $row=$statement->fetch();




  $sql12 = "SELECT * FROM admin where `id`=?";
 
                
  $statement12 = $conn->prepare($sql12);
  $statement12->execute([$row['emp']]);
   $key=$statement12->fetch();







?>

<section class="bg-white container" id="content-to-print1">
    <table style="width: 100%;">
        <tr>
            <td><b>Employe Name:</b></td>
            <td><?php
                                    $stmt2 = $conn->prepare("SELECT * FROM `admin` WHERE id=? ");
                                    $stmt2->execute([$row['emp']]);
                                   // print_r($stmt2);exit;
                                    $record2 = $stmt2->fetch();
                                    echo $record2['fname'].'  '.$record2['lname']; ?></td>
            <td><b>For month of</b></td>
            <td><?php echo $row['month'];?></td>
        </tr>
        <tr>
           
            <td><b>Genrated in</b></td>
        <td><?php echo date('F');?></td>
</td>
        </tr>
        <tr>
            <td><b>Available Leaves:</b></td>


            <?php $leave=$key['leavess'];
            $avl=$leave-$row['leave'];?>
            <td><?php echo $avl;?></td>
            <td><b>Year</b></td>
            <td><?php echo $row['year']; ?></td>
        </tr>
        <tr>
            <td><b>Joining Date:</b></td>
            <td><?php echo $key['created_date_time'];?></td>
            <td><b></b></td>
            <td>
                <!-- <//?php 
$lwp=0;
$sql0 = "SELECT * FROM `leave` where delete_status='0' AND `username`=? AND month(date)=?";
 
                
 $statement0 = $db->prepare($sql0);
 $statement0->execute([$_POST['emp'],$_POST['month']]);
$row0 = $statement0->fetchAll();
foreach($row0 as $res){
    //print_r($res);exit;
    $lwp=+$res['lwp_leaves'];
}

$perday=(12*$row['salary'])/365;
//print_r($perday);exit;
$deduction=$perday*$lwp;
            echo $lwp;?> -->
            </td>
        </tr>
    </table>
    <table style="width: 100%;" id="table2">
        <tr>
            <th colspan="2" style="text-align: center;">EMOLUMENTS</th>
            <th>AMOUNT Rs.</th>
            <th style="text-align: center;">DEDUCTIONS</th>
            <th>AMOUNT Rs.</th>
        </tr>
        <tr>
            <td colspan="2">Total Salary Per Month</td>
            <?php
            
            if ($row['month'] == "January") {
                $month = 31;
            } elseif ($row['month'] == "February") {
                $month = 28; // or 29 for leap years, handle that separately
            } elseif ($row['month'] == "March") {
                $month = 31;
            } elseif ($row['month'] == "April") {
                $month = 30;
            } elseif ($row['month'] == "May") {
                $month = 31;
            } elseif ($row['month'] == "June") {
                $month = 30;
            } elseif ($row['month'] == "July") {
                $month = 31;
            } elseif ($row['month'] == "August") {
                $month = 31;
            } elseif ($row['month'] == "September") {
                $month = 30;
            } elseif ($row['month'] == "October") {
                $month = 31;
            } elseif ($row['month'] == "November") {
                $month = 30;
            } elseif ($row['month'] == "December") {
                $month = 31;
            } else {
                $month = 0; // Invalid month
            }
            
            
            
            $actual= $row['actual']; 
                $total=$actual*$month; ?>

            <td><b><?php echo $total;?></b></td> 

            <?php $leave=$row['leave'];
            $leave_salary=$leave*$actual;
$total_de=$total-$leave_salary; ?>
            <td>Leave without pay</td>
       <td><b><?php echo $leave_salary;?></b></td> 
        </tr>
        <tr>
            <td style="background: rgb(226 239 218);" colspan="2">Salary after LWP</td>
            <td><b>
                <?php echo $total_de;?>
        </b></td>
            <td></td>
            <td></td>
        </tr>
        
        <tr>
            <td style="background: rgb(226 239 218);border: 1px solid;" colspan="2"></td>
            <td><b>
                
            </b></td>
            <td><b>Total Deduction</b></td>
            <td><b>
                <?php echo $leave_salary; ?>
            </b></td>
        </tr>
        <tr>
            <!-- </?php echo $final_salary=$final+$travel+$incentive; ?> -->
            <td colspan="2"></td>
            <td><b>
                <!-- <?php echo $final_salary+$deduction; ?> -->
            </b></td>
            <td style="background: rgb(255 255 0);"><b>Net Pay</b></td>
            <td style="background: rgb(255 255 0);"><b>
                <?php echo $total_de; ?>
            </b></td>
        </tr>
    </table>

    <table id="table3" style="margin-top: 20px;width: 100%;">
        <tr>
            <th>Authorized by</th>
            <th style="text-align: right;">Recived by</th>
        </tr>
    </table>
 
    
</section>


<div class="text-center col-md-12 py-4">
    <button class="btn btn-primary" id="btnDownload" >Download</button>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.js"></script>


<!-- download button -->
<script>
function download(url, filename) {
    var a = document.createElement("a");
    a.href = url;
    a.download = filename;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}

function saveCapture(element) {
    html2canvas(element).then(function(canvas) {
        var image = canvas.toDataURL("image/png");
        download(image, "downloaded_image.png");
    });
}

document.getElementById('btnDownload').addEventListener('click', function() {
    var element = document.getElementById('content-to-print1');
    saveCapture(element);
});
</script>