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
      extract($_POST);

      $stmt = $conn->prepare("insert into groups(name,description)values('$assign_name','$description')");
      $stmt->execute();
      $last_id = $conn->lastInsertId();
      $id = $last_id;
      $checkItem = $_POST["checkItem"];
      //print_r($_POST);exit;
      $a = count($checkItem);
      for ($i = 0; $i < $a; $i++) {
        $stmt = $conn->prepare("insert into permission_role(permission_id,group_id)values('$checkItem[$i]','$id')");
        $stmt->execute();
      }
      //echo "<script>alert(' Record Successfully Added');</script>";

      $_SESSION['reply'] = "003";
?>
      <div class="popup popup--icon -success js_success-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
          <h3 class="popup__content__title">
            Success
            </h1>
            <p>Record Successfully Added</p>
            <p>

              <?php echo "<script>setTimeout(\"location.href = '../View_Role.php';\",1500);</script>"; ?>
            </p>
        </div>
      </div>
      </div>

    <?php

    }
    if (isset($_POST['btn_edit'])) {
      //$id=$_GET['id'];
      //echo "string";
      extract($_POST);
      $stmt = $conn->prepare("delete  from permission_role where group_id='" . $_POST['id'] . "'");
      $stmt->execute();

      $stmt = $conn->prepare("UPDATE groups set name='$assign_name',description='$description' where id='" . $_POST['id'] . "'");
      $stmt->execute();

      $checkItem = $_POST["checkItem"];
      //print_r($_POST);
      $a = count($checkItem);
      for ($i = 0; $i < $a; $i++) {
        $id = $_POST['id'];

        $sql = "insert into permission_role(permission_id,group_id)values('$checkItem[$i]','$id')";
        $execute = $conn->query($sql);
      }
      if ($execute == true) {
        $_SESSION['reply'] = "004";
        //echo "<script>alert(' Record Successfully Updated');</script>";
      }
      //$_SESSION['reply'] = "003";
    ?>
      <div class="popup popup--icon -success js_success-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
          <h3 class="popup__content__title">
            Success
            </h1>
            <p>Record Successfully Updated</p>
            <p>

              <?php echo "<script>setTimeout(\"location.href = '../View_Role.php';\",1500);</script>"; ?>
            </p>
        </div>
      </div>
      </div>
    <?php

    }

    if (isset($_POST['del_id'])) {
      //$stmt = $conn->prepare("DELETE FROM customers WHERE id = :id");
      $stmt = $conn->prepare("UPDATE groups SET delete_status=1 WHERE id=:id");
      $stmt->bindParam(':id', $_POST['del_id']);
      $stmt->execute();
      // echo "<script>alert(' Record Successfully Deleted');</script>";

      //$_SESSION['reply'] = "003";
    ?>
      <div class="popup popup--icon -error js_error-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
          <h3 class="popup__content__title">Deleted
            </h1>
            <p>Record Successfully Deleted</p>
            <p>
              <a href="../View_Role.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
            </p>
        </div>
      </div>

<?php

    }
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
} else {

  header("location:../");
}

?>