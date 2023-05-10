<?php
    include "../connect/connect.php";

    for($i=1; $i<300; $i++){
        $regTime = time();

        $sql = "INSERT INTO board(memberID, boardTitle, boardContents, boardView, regTime) VALUES(1, '게시글 ${i}번 제목입니다.', '게시글 ${i}번에 들어가는 본문 내용입니다.게시글 ${i}번에 들어가는 본문 내용입니다.게시글에 들어가는 본문 내용입니다.게시글에 들어가는 본문 내용입니다.게시글에 들어가는 본문 내용입니다.게시글에 들어가는 본문 내용입니다.게시글에 들어가는 본문 내용입니다.', '1', '$regTime')";

        $connect -> query($sql);
    }
?>