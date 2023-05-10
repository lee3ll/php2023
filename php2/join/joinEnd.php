<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 페이지</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../html/assets/css/style.css">

    <!-- SCRIPT -->
    <script defer src="assts/js/common.js"></script>

</head>

<body>

    <div id="skip">
        <a href="#header">헤더 영역 바로가기</a>
        <a href="#main">컨텐츠 영역 바로가기</a>
        <a href="#footer">푸터 영역 바로가기</a>
    </div>
    <!-- //skip -->

    <header id="header">
        <div class="header__inner">
            <h1 class="logo"><a href="./main.html">회원가입 완료</a></h1>
        </div>
    </header>
    <!-- //header -->

    <main id="main" class="container">

        <div calss="joinEnd__inner">
            <p class="joinEnd__text">Abide By Beauty<br>
                <!-- <a>정희석(닉네임)님 반갑습니다.</a> -->
<?php
    include "../connect/connect.php"

?>
            </p>
            <div class="joinEnd__form">
                <p>ABB는 화장품 유통기한을 확인 하는 공간입니다.<br>
                    화장품의 유통기한을 간편하게 확인한 후<br>
                    당신의 피부와 아름다움을 지켜주세요. <br>
                    이제는 당신의 화장품을 쌓아두지 마세요<br>
                    과감히 버릴 수 있도록 ABB가 도와드립니다.</p>
                <button type="submit" class="btnStyle3">메인으로 이동</button>
            </div>
        </div>
    </main>
    <!-- //main -->

</body>

</html>