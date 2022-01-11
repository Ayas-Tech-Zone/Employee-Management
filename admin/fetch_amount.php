<?php
include ('../assets/constants/config.php');
include ('../assets/constants/fetch-my-info.php');

if (isset($_POST['month_id']) && isset($_POST['year_id'])) {
    $month_id = $_POST['month_id'];
    $year_id = $_POST['year_id'];
    $emp = $_POST['emp'];
    $stmt = $conn->prepare("SELECT SUM(amount) as amount FROM borrow WHERE month = ? AND year = ? AND emp=?");
    $stmt->execute([$month_id, $year_id,$emp]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // print_r($result);exit;
    if ($result) {
        echo json_encode($result);
    } else {
        echo json_encode(['amount' => '']);
    }
} else {
    echo json_encode(['amount' => '']);
}
?>