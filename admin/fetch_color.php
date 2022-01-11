

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

$product_id = $_GET['pid'];
try {
    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM tbl_product WHERE pid = :product_id");
    // Bind the parameter
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    // Execute the statement
    $stmt->execute();

    // Fetch the results
    $colors = $stmt->fetchAll();
// print_r($colors);exit;
    // Return the results as JSON
    echo json_encode($colors);

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>