<?php
include('../assets/constants/config.php');
include('../assets/constants/fetch-my-info.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // Fetch salary
    $stmt = $conn->prepare("SELECT salary FROM admin WHERE id = ?");
    $stmt->execute([$id]);
    $salaryResult = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Fetch count
    $stmt12 = $conn->prepare("SELECT COUNT(*) FROM leaves WHERE user = ? AND type = '2' AND status='1'");
    $stmt12->execute([$id]);
    $count = $stmt12->fetchColumn();
    
    // Combine both results into one array
    $result = [
        'salary' => $salaryResult['salary'] ?? null,
        'count' => $count
    ];
    
    // Encode result as JSON
    echo json_encode($result);
}
?>