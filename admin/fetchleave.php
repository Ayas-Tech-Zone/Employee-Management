<?php
include('../assets/constants/config.php');
include('../assets/constants/fetch-my-info.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
      
        $stmt = $conn->prepare("SELECT leavess FROM admin WHERE id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
           
            $stmt12 = $conn->prepare("SELECT COUNT(*) FROM leaves WHERE user = ? AND type = '2'");
            $stmt12->execute([$id]); // Use $id here
            $count11 = $stmt12->fetchColumn();

          
            if($count11==0)
            {
                $count=$result['leavess'];
            }else{
                 $count = $result['leavess']-$count11; 
            }
        





         
            if ($count11 == $result['leavess']) {
                $count = 0; 
            }

          
            $response = [
                'leavess' => $result['leavess'], 
                'count' => $count 
            ];

        
            echo json_encode($response);
        } else {
         
            echo json_encode(['error' => 'No admin found with the provided ID.']);
        }

    } catch (PDOException $e) {
     
        echo json_encode(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
} else {
  
    echo json_encode(['error' => 'No ID provided.']);
}
?>
