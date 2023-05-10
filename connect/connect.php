<?php
    // $host = "localhost",
    // $user = "lee3ll",
    // $pw = "ajtjs129!",
    // $db = "lee3ll",
    // $connect = new mysqli($host, $user, $pw, $db);
    // $connect -> set_charset("utf-8");

    // if(mysqli_connect_errno()){
    //     echo "Database Connect false";
    // } else {
    //     echo "Database Connect True";
    // }
?>

<?php
    $host = "localhost";
    $user = "root";
    $pw = "root";
    $db = "phpclass";
    $connect = new mysqli($host,$user,$pw,$db);
    $connect -> set_charset("utf-8");
    // if(mysqli_connect_errno()){
    //     echo "Database Connect false";
    // } else {
    //     echo "Database Connect True";
    // }
?>
