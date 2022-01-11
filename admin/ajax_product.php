

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
 
?>

<?php
//include('connect.php');


  if(isset($_POST['drop_services']))
  {

      // print_r($_POST[]);exit;
       $sql_service1 ="SELECT * FROM tbl_product WHERE id  = '".$_POST['drop_services']."' AND delete_status='0' AND color=? AND size=?";
       $statement = $conn->prepare($sql_service1);
 $statement->execute([$_POST['color'],$_POST['size']]);
                                                             
                                                                
    $service1 = $statement->fetch(PDO::FETCH_ASSOC);
 
        /*$result1=$conn->query($sql_service1);  
        $service1 = mysqli_fetch_array($result1);
        */$data['product']=$service1;

        $data['products'] = $statement->fetchAll();

        echo json_encode($data); exit;
  }
?>