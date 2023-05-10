<?php
    if(!isset($_SESSION['memberId'])){
        Header("Location:../login/login.php");
    }
?>