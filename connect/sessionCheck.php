<?php
    if(!isset($_SESSION['memberID'])){
        header("Location:../login/login.php");
    }
?>