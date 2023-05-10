<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }
    $searchKeyword = $_GET['searchKeyword'];
    $searchOption = $_GET['searchOption'];
    $searchKeyword = $connect -> real_escape_string(trim($searchKeyword));
    $searchOption = $connect -> real_escape_string(trim($searchOption));
    $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView FROM board b JOIN members m ON(b.memberID = m.memberID) ";
    // $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView FROM board b JOIN members m ON(b.memberID = m.memberID) WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC";
    // $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView FROM board b JOIN members m ON(b.memberID = m.memberID) WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY boardID DESC";
    // $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView FROM board b JOIN members m ON(b.memberID = m.memberID) WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC";
    switch($searchOption){
        case "title":
            $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC ";
            break;
        case "content":
            $sql .= "WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY boardID DESC ";
            break;
        case "name":
            $sql .= "WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC ";
            break;
    }
    $result = $connect -> query($sql);
    $totalCount = $result -> num_rows;
    // echo $totalCount;
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
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->
    <main id="main" class="container">
        <div class="intro__inner center">
            <picture class="intro__images small">
                <source srcset="../assets/img/joinEnd01.png, ../assets/img/joinEnd01@2x.png 2x, ../assets/img/joinEnd01@3x.png 3x"/>
                <img src="../assets/img/joinEnd01.png" alt="회원가입 이미지">
            </picture>
            <h2>결과 게시판</h2>
            <p class="intro__text">
                웹 디자이너, 웹 퍼블리셔, 프론트앤드 개발자를 위한 게시판입니다.<br><br>
                총<em><?=$totalCount?></em>건의 게시물이 검색되었습니다.
            </p>
        </div>
    <!-- intro__inner -->
    <div class="board__inner">
        <div class="board__table">
                <table>
                    <colgroup>
                        <col style="width: 5%">
                        <col>
                        <col style="width: 10%">
                        <col style="width: 15%">
                        <col style="width: 7%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>번호</th>
                            <th>제목</th>
                            <th>등록자</th>
                            <th>등록일</th>
                            <th>조회수</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
    $viewNum = 20;
    $viewLimit = ($viewNum * $page) - $viewNum;
    $sql .= "LIMIT {$viewLimit}, {$viewNum}";
    $result = $connect -> query($sql);
    if($result){
        $count = $result -> num_rows;
        if($count >0){
            for($i=0; $i<$count; $i++){
                $info = $result -> fetch_array(MYSQLI_ASSOC);
                echo "<tr>";                
                echo "<td>".$info['boardID']."</td>";
                echo "<td><a href='boardView.php?boardID={$info['boardID']}'>".$info['boardTitle']."</a></td>";
                echo "<td>".$info['youName']."</td>";
                echo "<td>".date('Y-m-d', $info['regTime'])."</td>";
                echo "<td>".$info['boardView']."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>게시글이 없습니다.</td></tr>";
        }
    }
?>
                        <!-- <tr>
                            <td>1</td>
                            <td><a href="boardView.html">게시판 제목</a></td>
                            <td>이름</td>
                            <td>2022-02-02</td>
                            <td>100</td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <div class="board__pages">
                <ul>
<?php
    //총 페이지 갯수
    $boardTotalCount = ceil($totalCount/$viewNum);

    //1 2 3 4 5 [6] 7 8 9 10 11
    $pageView = 4;
    $startPage = $page - $pageView;
    $endPage = $page + $pageView;

    //처음 페이지 초기화
    if($startPage < 1) $startPage = 1;

    //마지막 페이지 초기화
    if($endPage >= $boardTotalCount) $endPage = $boardTotalCount;

    //처음으로
    if($page != 1 && $page <= $boardTotalCount){
        $prevPage = $page-1;
        echo "<li><a href='boardSearch.php?page=1&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>처음으로</a></li>";
        echo "<li><a href='boardSearch.php?page={$prevPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>이전</a></li>";
    }   
       
    //페이지
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page) $active = "active";
        
        if($page <= $boardTotalCount){
        echo "<li class='{$active}'><a href='boardSearch.php?page={$i}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>{$i}</a></li>";
        }
    }

    //마지막으로/다음
    if($page != $boardTotalCount && $page <= $boardTotalCount){
        $nextPage = $page+1;
        echo "<li><a href='boardSearch.php?page={$nextPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>다음</a></li>";
        echo "<li><a href='boardSearch.php?page={$boardTotalCount}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>마지막으로</a></li>";
    }

?>
                </ul>

            </div>
        </div>
    </div>
</main>
    <?php include "../include/footer.php" ?>
    <!-- //footer -->
</body>
</html>