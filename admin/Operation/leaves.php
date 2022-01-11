<link rel="stylesheet" href="popup_style.css">

<?php
error_reporting(0);
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

  require_once('../../assets/constants/config.php');

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['btn_save'])) {


      $stmt = $conn->prepare("INSERT INTO `leaves`(`user`, `month`, `year`, `date`, `type`, `total`) VALUES (?,?,?,?,?,?)");

      $stmt->execute([$_POST['fname'],$_POST['month'],$_POST['year'],$_POST['date'],$_POST['l_type'],$_POST['total']]);
      //echo "<script>alert(' Record Successfully Added');</script>";

      $_SESSION['reply'] = "003";
?>
      <div class="popup popup--icon -success js_success-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
          <h3 class="popup__content__title">Success</h3>
          <p>Record Successfully Added</p>
          <p>
            <?php echo "<script>setTimeout(\"location.href = '../view_leaves.php';\",1500);</script>"; ?>
          </p>
        </div>
      </div>
      </div>

<?php

    }

if (isset($_POST['update'])) {

    // print_r($_POST);exit;
  
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $contact = htmlspecialchars($_POST['contact']);
    $address = htmlspecialchars($_POST['address']);
    $gst = htmlspecialchars($_POST['gst']);
    $id = htmlspecialchars($_POST['id']);

$stmt = $conn->prepare("UPDATE `leaves` SET `user` = ?,  `month` = ?, `year` = ?, `date` = ?, `type` = ?, `total` = ?  WHERE `id` = ?");
$stmt->execute([$_POST['fname'],$_POST['month'], $_POST['year'], $_POST['date'], $_POST['l_type'],$_POST['total'], $_POST['id']]);

    
    
      if ($execute == true) {
        $_SESSION['reply'] = "004";
        //echo "<script>alert(' Record Successfully Updated');</script>";
      }
      //$_SESSION['reply'] = "003";
?>
      <div class="popup popup--icon -success js_success-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
          <h3 class="popup__content__title">Success</h3>
          <p>Record Successfully Updated</p>
          <p>
            <?php echo "<script>setTimeout(\"location.href = '../view_leaves.php';\",1500);</script>"; ?>
          </p>
        </div>
      </div>
      </div>
<?php

    }

    if (isset($_POST['del_id'])) {
//   print_r($_POST['del_id']);exit;
      $stmt = $conn->prepare("UPDATE leaves SET delete_status=1 WHERE id=:id");
      $stmt->bindParam(':id', $_POST['del_id']);
      $stmt->execute();
      $_SESSION['reply'] = "005";
      //echo "<script>alert(' Record Successfully Deleted');</script>";

      //$_SESSION['reply'] = "003";
?>
      <div class="popup popup--icon -error js_error-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
          <h3 class="popup__content__title">Deleted</h3>
          <p>Record Successfully Deleted</p>
          <p>
            <a href="../view_leaves.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
          </p>
        </div>
      </div>
<?php

    }




    if (isset($_POST['change'])) {

    // print_r($_POST);exit;
  
    $remark = htmlspecialchars($_POST['remark']);
    $status = htmlspecialchars($_POST['status']);
   
    $id = htmlspecialchars($_POST['id']);

$stmt = $conn->prepare("UPDATE `leaves` SET `status` = ?,  `remark` = ? WHERE `id` = ?");
$stmt->execute([$_POST['status'],$_POST['remark'],$_POST['id']]);

    
    
      if ($execute == true) {
        $_SESSION['reply'] = "004";
        //echo "<script>alert(' Record Successfully Updated');</script>";
      }
      //$_SESSION['reply'] = "003";
?>
      <div class="popup popup--icon -success js_success-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
          <h3 class="popup__content__title">Success</h3>
          <p>Record Successfully Updated</p>
          <p>
            <?php echo "<script>setTimeout(\"location.href = '../view_leaves.php';\",1500);</script>"; ?>
          </p>
        </div>
      </div>
      </div>
<?php

    }







  } catch (PDOException $e) {
    echo "Connection failed: " . htmlspecialchars($e->getMessage());
  }
} else {

  header("location:../");
}

?>
