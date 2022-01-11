<?php
//error_reporting(0);
require_once('../assets/constants/config.php');
require_once('../assets/constants/check-login.php');
require_once('../assets/constants/fetch-my-info.php');
/* echo$sql_service1 ="SELECT * FROM tbl_product WHERE id  = 1";
       $statement = $conn->prepare($sql_service1);
 $statement->execute();
                                                             
                                                                
    $service1 = $statement->fetch(PDO::FETCH_ASSOC);
    $data['product']=$service1;
print_r($service1);
*/ 
 


$deptid = 0;

/*if(isset($_POST['depart'])){
   $departid = mysqli_real_escape_string($conn,$_POST['depart']); // department id
}
*/
$users_arr = array();

   //$sql = "SELECT id,name FROM users WHERE department=".$departid;
 $sql ="SELECT id,unit_price FROM tbl_product WHERE id  = '".$deptid."'";
     $statement = $conn->prepare($sql);
 $statement->execute();
                                                             
                                                                
 
   //$result = mysqli_query($conn,$sql);

   while($row = $statement->fetch(PDO::FETCH_ASSOC)
 ){
      $userid = $row['id'];
      echo$unit_price = $row['unit_price'];
      //$staff_addr = $row['staff_addr'];
      //$currentreading = $row['currentreading'];

      $users_arr[] = array("id" => $userid, "unit_price" => $unit_price);
   }

// encoding array to json format
echo json_encode($users_arr);