<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    //총 페이지
    $sql = "SELECT count(boardID) FROM board";
    $result = $connect -> query($sql);

    $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardTotalCount = $boardTotalCount['count(boardID)'];

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
    <?php include "../include/head.php" ?>
</head>
<body class="gray">
    <?php include "../include/skip.php" ?>
    <!-- skip -->
    
    <?php include "../include/header.php" ?>
    <!-- header -->
    <main id="main" class="container">
        <div class="blog__search">
            <h2>카페투어 블로그 입니다.</h2>
            <p>카페를 소개하는 글입니다.</p>
            <div class="search">
                <form action="#" name="#" method="POST">
                    <legend class="blind">블로그 검색</legend>
                    <input type="search" class="inputStyle2" name="searchKeyword" aria-label="검색" placeholder="검색어를 입력하세요">
                    <button type="submit" class="btnStyle4 ml40">검색하기</button>
                    <?php if(isset($_SESSION['memberID'])){ ?>
                        <div class="mt20"><a href="blogwrite.php" class="btnStyle4 white">글쓰기</a></div>                   
                    <?php } ?>                    
                </form>
            </div>
        </div>        
        <div class="blog__inner">
            <div class="left">                
                <div class="blog__wrap">
                    <h2>all popst</h2>
                    <div class="cards__inner col3 line3">
                                              
                  
<?php
    $sql ="SELECT * FROM blog WHERE blogDelete = 0 ORDER BY blogID DESC";
    $result = $connect -> query($sql);
?>
    <?php foreach($result as $blog){?>
        <div class="card">
            <figure class="card__img">
                <a href="blogView.php?blogID=<?=$blog['blogID']?>">
                    <img src="../assets/blog/<?=$blog['blogImgFile']?>" alt="<?=$blog['blogTitle']?>">
                </a>
            </figure>
            <div class="card__title">
                <h3><?=$blog['blogTitle']?></h3>
                <p><?=$blog['blogContents']?></p>
            </div>
            <div class="card__info">
                <a href="#" class="more"></a>
            </div>
        </div>   
    <?php }?>
    </div>

                </div>
            </div>          
            <div class="right">
                <div class="blog__aside">                    
                    <div class="intro">
                        <picture class="intro__img">
                            <source srcset="../assets/img/profile.jpg, ../assets/img/profile@2x.jpg 2x, ../assets/img/intro01@3x.png 3x" />
                            <img src="../assets/img/profile.jpg" alt="소개이미지">
                            <p class="text">
                                오점뭐
                            </p>
                        </picture>
                    </div>
                    <div class="cate">
                        <h4>카테고리</h4>
                    </div>
                    <div class="cate">
                        <h4>최신 글</h4>
                    </div>
                    <div class="cate">
                        <h4>인기 글</h4>
                    </div>
                    <div class="cate">
                        <h4>최신 댓글</h4>
                    </div>
                </div>
            </div> 
        </div>
         

        <!-- 
            <div class="sliders__inner"></div> 각 페이지 소개 배너
            <div class="join__inner"></div> 회원가입 페이지
            <div class="login__inner"></div> 로그인 페이지
            <div class="board__inner"></div> 게시판 페이지
            <div class="blog__inner"></div> 블로그 메인
                        
            <div class="banners__inner"></div>
            <div class="cards__inner"></div>
            <div class="images__inner"></div>
            <div class="ads__inner"></div>
            <div class="texts__inner"></div>
            <div class="login__inner"></div> 회원가입 페이지
            
            <div class="bolg__inner"></div> -->
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    
</body>
</html>