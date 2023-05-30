

<!--phpmyadmin에서 실행시키기 -->



INSERT INTO members2 (youEmail, youName, youPass, youPhone, regTime, nickName, youBirth, youImgSrc, youImgSize, youGender)
VALUES ('example1@example.com', '홍길동', 'qweqwe123!', '010-1234-5678', UNIX_TIMESTAMP(), 'John', '1990-01-01', 'noImg.jpg', '1024x768', 'Male');

INSERT INTO members2 (youEmail, youName, youPass, youPhone, regTime, nickName, youBirth, youImgSrc, youImgSize, youGender)
VALUES ('example2@example.com', '김영희', 'qweqwe123!', '010-2345-6789', UNIX_TIMESTAMP(), 'Jane', '1995-05-10', 'noImg.jpg', '800x600', 'Female');

INSERT INTO members2 (youEmail, youName, youPass, youPhone, regTime, nickName, youBirth, youImgSrc, youImgSize, youGender)
VALUES ('example3@example.com', '이철수', 'qweqwe123!', '010-3456-7890', UNIX_TIMESTAMP(), 'Mike', '1985-12-20', 'noImg.jpg', '1280x720', 'Male');