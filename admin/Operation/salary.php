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


      $stmt = $conn->prepare("INSERT INTO `salary`(`emp`, `month`, `year`, `leave`, `borrow`, `actual`, `final`) VALUES (?,?,?,?,?,?,?)");

      $stmt->execute([$_POST['fname'],$_POST['month'],$_POST['year'],$_POST['leave'],$_POST['amount'],$_POST['actual'],$_POST['final']]);
      //echo "<script>alert(' Record Successfully Added');</script>";

      $_SESSION['reply'] = "003";
?>
      <div class="popup popup--icon -success js_success-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
          <h3 class="popup__content__title">Success</h3>
          <p>Record Successfully Added</p>
          <p>
            <?php echo "<script>setTimeout(\"location.href = '../view_salary.php';\",1500);</script>"; ?>
          </p>
        </div>
      </div>
      </div>

<?php

    }

if (isset($_POST['btn_edit'])) {

    // print_r($_POST);exit;
  
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $contact = htmlspecialchars($_POST['contact']);
    $address = htmlspecialchars($_POST['address']);
    $gst = htmlspecialchars($_POST['gst']);
    $id = htmlspecialchars($_POST['id']);

    $stmt = $conn->prepare("UPDATE supplier SET name=:name, email=:email, contact=:contact, address=:address , gst=:gst WHERE id=:id");

 
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':contact', $contact);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':gst', $gst);
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
            <?php echo "<script>setTimeout(\"location.href = '../View_supplier.php';\",1500);</script>"; ?>
          </p>
        </div>
      </div>
      </div>
<?php

    }

    if (isset($_POST['del_id'])) {
//   print_r($_POST['del_id']);exit;
      $stmt = $conn->prepare("UPDATE salary SET delete_status=1 WHERE id=:id");
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
            <a href="../View_supplier.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
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
