<?php
    include "../connect/session.php";

    unset($_SESSION['memberID']);
    unset($_SESSION['youEmail']);
    unset($_SESSION['youName']);
    unset($_SESSION['nickName']);

    Header("Location: ../main/main.php");
?>