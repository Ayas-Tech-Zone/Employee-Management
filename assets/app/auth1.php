<link rel="stylesheet" href="popup_style.css">


<?php
error_reporting(0);
session_start();
//configuration file
require_once('../constants/config.php');

$email_address = $_POST['email'];

$passw = hash('sha256', $_POST['password']);
//$passw = hash('sha256',$p);
//echo $passw;exit;
function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
$pass = hash('sha256', $salt . $passw);
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM voter WHERE email = :email ");
$stmt->bindParam(':email', $email_address);
$stmt->execute();
$result = $stmt->fetchAll();

//getting number of records found
$rec = count($result);

if ($rec > 0) {
foreach($result as $row) {


$role = $row['role'];
$avator = $row['image'];
$_SESSION['id'] = $row['id'];		

}

switch ($role) {
	case 'admin':
	
		# verifying password
	if ($pass== $row['password']) {

	admin_login();


	}else{
		  //echo "<script>alert('Invalid Login');</script>";?>
		 <div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p>Invalid Email or Password</p>
    <p>
      <a href="../../login.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
    </p>
  </div>
</div>
    <?php
/* echo "<script>document.location='../../index.php'
</script>";
*/	/*$_SESSION['reply'] = "001";
    header("location:../../");
*/
	}
		break;
	
	case 'users':

	if ($pass== $row['password']) {

	student_login();

	}else{

	$_SESSION['reply'] = "001";
    header("location:../../");

	}
		break;
}

}else{

/*$_SESSION['reply'] = "001";
echo "string"; exit;
header("location:../../");
*/
}

					  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

function admin_login() {

$_SESSION['logged'] = "1";
$_SESSION['role'] = "admin";
$_SESSION['email'] = $GLOBALS['email_address'];
$_SESSION['avator'] = $GLOBALS['avator'];
 /* echo "<script>alert('  Login Successfully');</script>";
 echo "<script>document.location='../../admin'
</script>";*/?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p>Login Successfully</p>
    <p>
    
     <?php echo "<script>setTimeout(\"location.href = '../../voter';\",1500);</script>"; ?>
    </p>
  </div>
</div>
</div>
<?php }

function student_login() {
	 
$_SESSION['logged'] = "1";
//$_SESSION['role'] = "users";
$_SESSION['role'] = $role;
$_SESSION['email'] = $_POST['email_address'];
$_SESSION['avator'] = $avator;
}
?>