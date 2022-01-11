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

// print_r($_POST);exit;
      $stmt = $conn->prepare("INSERT INTO `borrow`(`emp`, `amount`, `month`, `year`, `reason`) VALUES (?,?,?,?,?)");

      $stmt->execute([$_POST['name'],$_POST['amount'],$_POST['month'],$_POST['year'],$_POST['reason']]);
      //echo "<script>alert(' Record Successfully Added');</script>";

      $_SESSION['reply'] = "003";
?>
      <div class="popup popup--icon -success js_success-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
          <h3 class="popup__content__title">Success</h3>
          <p>Record Successfully Added</p>
          <p>
            <?php echo "<script>setTimeout(\"location.href = '../view_borrow.php';\",1500);</script>"; ?>
          </p>
        </div>
      </div>
      </div>

<?php

    }

if (isset($_POST['btn_edit'])) {

    // print_r($_POST);exit;
  
    $emp = htmlspecialchars($_POST['name']);
    $amount = htmlspecialchars($_POST['amount']);
    $month = htmlspecialchars($_POST['month']);
    $year = htmlspecialchars($_POST['year']);
    $reason = htmlspecialchars($_POST['reason']);
    $id = htmlspecialchars($_POST['id']);

$stmt = $conn->prepare("UPDATE borrow SET emp=:emp, amount=:amount, month=:month, year=:year , reason=:reason WHERE id=:id");

 
    $stmt->bindParam(':emp', $emp);
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':month', $month);
    $stmt->bindParam(':year', $year);
    $stmt->bindParam(':reason', $reason);
    $stmt->bindParam(':id', $id);

    $execute = $stmt->execute();
    
    
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
            <?php echo "<script>setTimeout(\"location.href = '../View_borrow.php';\",1500);</script>"; ?>
          </p>
        </div>
      </div>
      </div>
<?php

    }

    if (isset($_POST['del_id'])) {
//   print_r($_POST['del_id']);exit;
      $stmt = $conn->prepare("UPDATE borrow SET delete_status=1 WHERE id=:id");
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
            <a href="../View_borrow.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
          </p>
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
