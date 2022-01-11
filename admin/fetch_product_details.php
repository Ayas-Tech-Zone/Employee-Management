<?php

// Include your database configuration file here
require_once('../assets/constants/config.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the barcode from the POST data
$barcode = $_POST['barcode'];

// Query the product table to get details based on the barcode
$sqlProduct = "SELECT * FROM tbl_product WHERE id = '$barcode' AND delete_status='0'";
$resultProduct = $conn->query($sqlProduct);

if ($resultProduct->num_rows > 0) {
    // If a matching product is found, return the product information as JSON
    $rowProduct = $resultProduct->fetch_assoc();
    $product = array(
        'product_id' => $rowProduct['id'],
        'product_name' => $rowProduct['name'],
        'price' => $rowProduct['unit_price'],
         'color' => $rowProduct['color'],
          'size' => $rowProduct['size'],
           'pid' => $rowProduct['pid'],
        'openning_stock' => $rowProduct['openning_stock'],
          'unit' => $rowProduct['unit']
        // Add other product information as needed
    );
    echo json_encode($product);
} else {
    // If no matching product is found, return an error
   // echo json_encode(array('error' => 'Product not found'));
}

// Close the database connection
$conn->close();

?>
