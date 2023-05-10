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
            <div>
                <h2>회원가입</h2>
            </div>
        </div>
    </header>
    <!-- //header -->

    <main id="main" class="container">
        <div class="join__inner">
            <h2>Abide By Beauty</h2>
            <p>회원가입을 위해 아이디와 비밀번호를 등록해주세요.</p>
            
            <div class="join__form">
                <form action="#" name="#" method="post">
                    <fieldset>
                        <legend class="blind">회원가입 영역</legend>
                        <div>
                            <label for="memberID"></label>
                            <input type="text" id="memberID" name="memberID" class="inputStyle" placeholder="아이디" required>
                        </div>
                        <div>
                            <label for="youPass"></label>
                            <input type="password" id="youPass" name="youPass" class="inputStyle" placeholder="비밀번호" required>
                        </div>
                        <div>
                            <label for="youPassC"></label>
                            <input type="password" id="youPassC" name="youPassC" class="inputStyle" placeholder="비밀번호 확인" required>
                        </div>
                        <div>
                            <label for="youName"></label>
                            <input type="text" id="youName" name="youName" class="inputStyle" placeholder="이름" required>
                        </div>
                        <div>
                            <label for="youPhone"></label>
                            <input type="text" id="youPhone" name="youPhone" class="inputStyle" placeholder="휴대폰번호" required>
                            <span id="chkPhone"></span>

                        </div>
                        <div>
                            <label for="nickName"></label>
                            <input type="text" id="nickName" name="nickName" class="inputStyle" placeholder="닉네임" required>
                            <span id="chkNickName"></span>
                        </div>
                        <div>
                            <label for="youBirth"></label>
                            <input type="text" id="youBirth" name="youBirth" class="inputStyle" placeholder="생년월일" required>
                        </div>
                        <div> 
                            <label for="youGender"></label>
                            <select type="text" id="youGender" name="youGender" class="inputStyle" placeholder="성별" required>
                                <option value="">성별 선택</option>
                                <option value="남">남</option>
                                <option value="여">여</option>
                            </select>
                        </div>
                        
                        
                        <button type="submit" class="btnStyle3">회원가입 완료</button>
                    </fieldset>
                </form>
            </div>
        </div> 
    </main>
    <!-- main -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script>
        $( document ).ready(function() {
            //nickName 을 keyup했을때 
            $('#nickName').keyup(function(){
                console.log('first');
                $.ajax({
                    url: "chkJoin/joinChkNick.php",     //해당 url가서 실행됨
                    type: "post",                   //post방식으로 
                    data: $("#nickName").serialize()//data는 nickName을가져감   //요기까지가 실행문
                }).done(function(data){			
                    // if(""){}
                    $("#chkNickName").html(data);   //결과값 세팅해주기
                });
            });
            $('#memberID').keyup(function(){
                console.log('first');
                $.ajax({
                    url: "chkJoin/joinChkID.php",
                    type: "post",
                    data: $("#nickName").serialize()
                }).done(function(data){			
                    $("#chknickName").html(data);		
                });
                
            });
            // document.querySelector("#youPhone").addEventListener("keyup",()=>{ }); 1번방식
            $('#youPhone').keyup(function(){                                         //2번방식
                
                //php 문법을 javascript 문법으로 변경
                const phoneChk= document.getElementById("youPhone").value;
                console.log(phoneChk);
                let check_number = /^(010|011|016|017|018|019)-[0-9]{4}-[0-9]{4}$/;

                if(!check_number.test(phoneChk)){
                    $("#chkPhone").text("번호가 정확하지 않습니다. 올바른번호 (000-0000-0000) 형식으로 작성해 주세요");   //결과값 세팅해주기
                }else{
                    $("#chkPhone").text("사용가능합니다");   //결과값 세팅해주기
                }
            });
        });
    </script>
</body>
</html>
