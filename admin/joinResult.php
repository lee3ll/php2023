<?php
    include "../connect/connect.php";

    $adminName = $_POST['youName'];
    $adminEmail = $_POST['youEmail'];
    $adminNick = $_POST['youNick'];
    $adminPass = sha1($_POST['youPass']);
    $adminBirth = $_POST['youBirth'];
    $adminPhone = $_POST['youPhone'];
    $regTime = time();

    $sql = "INSERT INTO adminMembers(adminEmail, adminName, adminNick, adminPass, adminBirth, adminPhone, adminDelete, adminRegtime, adminModtime) VALUES('$adminEmail', '$adminName', '$adminNick', '$adminPass', '$adminBirth', '$adminPhone', '1', '$regTime', '$regTime')";
    $connect -> query($sql);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 페이지</title>

    <?php include "../include/head.php"?>
    <style>            
        .intro__images img{
            width: 100%;
            /* height: 400px; */
            margin: 0 auto;
            align-items: center;
            border-radius: 50%;       
        }
        .join__agree p{
            text-align: center;
            font-size: 25px;
        }        
    </style>
</head>
<body class="gray">
    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- header -->

    <main id="main" class="container">
        <div class="intro__inner center bmStyle">
            <picture class="intro__images">
                <!-- <source srcset="assets/img/join01.png, assets/img/join01@2x.png 2x, assets/img/join01@3x.png 3x" />
                <img src="assets/img/join01.png" alt="회원가입 이미지"> -->
                <img src="https://media2.giphy.com/media/DyQrKMpqkAhNHZ1iWe/giphy.gif?cid=ecf05e478dydjndh494oz2s11fqt8z5tlbrkavos7dl7bbkq&ep=v1_gifs_search&rid=giphy.gif&ct=g" alt="회원가입 이미지">
            </picture>
            <p class="intro__text">
                환영합니다.
            </p>
        </div>
        <div class="join__inner" container>
            <h2>회원가입 완료</h2>
            <div class="index">
                <ul>
                    <li>1</li>
                    <li>2</li>
                    <li class="active">3</li>
                </ul>
            </div>
            <div class="join__agree">
                <p>회원가입이 완료되었습니다.<br>로그인을 통해 게시판에 글을 작성해 보세요!</p>
            </div>
            <button type="submit" class="btnStyle">관리자 로그인</button>
        </div>
    </main>
    <!-- //main -->
    
    <?php include "../include/footer.php" ?>
    <!-- //footer -->
</body>
</html>