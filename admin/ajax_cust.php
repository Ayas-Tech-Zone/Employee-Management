<?php
//error_reporting(0);
require_once('../assets/constants/config.php');

require_once('../assets/constants/check-login.php');
require_once('../assets/constants/fetch-my-info.php');



if(isset($_POST['id']) ){
  // print_r($_POST);
$result=array();
         $id= htmlspecialchars($_POST['id']); 
          //  print_r($id);
    $stmt = $conn->prepare("SELECT * FROM customer WHERE id='".$id."' ");
//   print_r($stmt);
    $stmt->execute();
    $display1 = $stmt->fetchAll(); 

    
    $result['display1']=$display1;
  
            echo json_encode($result);

}
?>

