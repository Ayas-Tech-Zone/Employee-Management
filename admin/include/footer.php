 <?php
 require_once('../assets/constants/check-login.php');

require_once('../assets/constants/config.php');
require_once('../assets/constants/fetch-my-info.php');

 $sql = "SELECT * FROM manage_website where status='0'";
 
                
  $statement = $conn->prepare($sql);
                                                 $statement->execute();
                                                             
                                                                
                                              $row = $statement->fetch(PDO::FETCH_ASSOC);
                                                                    extract($row);?>


<style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
 
 
  text-align: center;
}
</style>

            
<?php if (!empty($_SESSION['success'])) {
?>
  <div class="popup popup--icon -success js_success-popup popup--visible">
    <div class="popup__background"></div>
    <div class="popup__content">
      <h3 class="popup__content__title">
        Success
        </h1>
        <p> <?php echo $_SESSION['success']; ?> </p>
        <p>

          <?php //echo "<script>setTimeout(\"location.href = '#';\",1500);</script>"; 
          ?>

        </p>
    </div>

  </div>
<?php $_SESSION['success'] = '';
  echo '<script>
            setTimeout(function() {
                location.reload();
            }, 1500); 
          </script>';
} ?>

<?php if (!empty($_SESSION['error'])) {
?>

  <div class="popup popup--icon -error js_error-popup popup--visible">
    <div class="popup__background"></div>
    <div class="popup__content">
      <h3 class="popup__content__title">
        Error
        </h1>
        <p> <?php echo $_SESSION['error']; ?> </p>
        <p>
        <p>
          <!-- <a href="../index.php"><button class="button button--error" data-for="js_error-popup">Close</button></a> -->
          <?php //echo "<script>setTimeout(\"location.href = '#';\",1500);</script>"; 
          ?>
        </p>
    </div>
  </div>
<?php $_SESSION['error'] = '';
  echo '<script>
            setTimeout(function() {
                location.reload();
            }, 1500); 
          </script>';
} ?>
      
      
      
      
      <script>
    function editForm(event, id, file) {
        event.preventDefault(); // Prevent the default link behavior

        // Create a form dynamically
        var form = document.createElement('form');
        form.action = file;
        form.method = 'post';

        // Create a hidden input field for the ID
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'id';
        input.value = id;

        // Append the input field to the form
        form.appendChild(input);

        // Append the form to the body and submit it
        document.body.appendChild(form);
        form.submit();
    }
</script>


<script>
    function delForm(event, id, file) {
        event.preventDefault(); // Prevent the default link behavior

        // Create a form dynamically
        var form = document.createElement('form');
        form.action = file;
        form.method = 'post';

        // Create a hidden input field for the ID
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'del_id';
        input.value = id;

        // Append the input field to the form
        form.appendChild(input);

        // Append the form to the body and submit it
        document.body.appendChild(form);
        form.submit();
    }
    </script>
    



    
    


</body>
</html>


    
    
    
    
            