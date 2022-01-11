

<?php
//error_reporting(0);
require_once('../assets/constants/config.php');
require_once('../assets/constants/check-login.php');
require_once('../assets/constants/fetch-my-info.php');
?>

<?php
//include('connect.php');


  if(isset($_POST['group_id']))
  {
       $sql_service1 ="SELECT * FROM tbl_product WHERE group_id  = '".$_POST['group_id']."' AND delete_status='0' GROUP BY pid";
       $statement = $conn->prepare($sql_service1);
        $statement->execute();
            $data['products'] = $statement->fetchAll();
        echo json_encode($data); exit;
  }
?>