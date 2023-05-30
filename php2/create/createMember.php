<?php
    include "../connect/connect.php";
    $sql = "create table members2(";
    $sql .= "memberID int(10) unsigned auto_increment,";
    $sql .= "youEmail varchar(40) UNIQUE NOT NULL,";
    $sql .= "youName varchar(10) NOT NULL,";
    $sql .= "youPass varchar(20) NOT NULL,";
    $sql .= "youPhone varchar(40),";
    $sql .= "regTime int(40) NOT NULL,";
    $sql .= "nickName varchar(40) NOT NULL,";
    $sql .= "youBirth varchar(20) NOT NULL,";
    $sql .= "youImgSrc varchar(40) DEFAULT NULL,";
    $sql .= "youImgSize varchar(40) DEFAULT NULL,";
    $sql .= "youGender varchar(10) DEFAULT NULL,";
    $sql .= "PRIMARY KEY(memberID)";
    $sql .= ") charset=utf8;";
    $result = $connect -> query($sql);
    if($result){
        echo "create tables Complete 신규 추가 컬럼확인";
    } else {
        echo "create tables false & 신규 추가 컬럼확인";
    }
?>



<!-- ALTER TABLE members2			
ADD COLUMN KakaoTalk VARCHAR(1) DEFAULT NULL,			
ADD COLUMN SNSSub VARCHAR(1) DEFAULT NULL,			
ADD COLUMN KakaoSub VARCHAR(1) DEFAULT NULL;			 

ALTER TABLE members2 ADD COLUMN skinType VARCHAR(10) DEFAULT NULL;

4개 컬ㄹ럼 추가
-->


