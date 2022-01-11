<?php
if (isset($_POST['lev']) && isset($_POST['pen'])) {
    $lev = $_POST['lev'];
    $pen = $_POST['pen'];


    $calculationResult = $lev * $pen; 


    echo $calculationResult;
}
?>