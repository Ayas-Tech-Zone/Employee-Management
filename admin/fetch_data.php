

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
if (isset($_POST['productPid']) && isset($_POST['color_id']) && isset($_POST['size_id']) && isset($_POST['unit_id'])) {
    $product_id = $_POST['productPid']; 
    $color_id = $_POST['color_id'];
    $size_id = $_POST['size_id'];
     $unit_id = $_POST['unit_id'];

    $query = "SELECT * FROM tbl_product WHERE pid = ? AND color = ? AND size = ? AND unit=?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$product_id, $color_id, $size_id, $unit_id]);
    $data = $stmt->fetch();

    if ($data) {
        echo json_encode($data);
    } else {
        echo json_encode(['unit_price' => 0, 'stock' => 0]);
    }

    $stmt->closeCursor(); // Close the cursor
    $conn = null; // Close the database connection
}
?>