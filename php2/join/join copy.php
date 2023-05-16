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
    <script defer src="../html/assets/js/common.js"></script>

</head>
<body >
    <div id="skip">
        <a href="#header">헤더 영역 바로가기</a>
        <a href="#main">컨텐츠 영역 바로가기</a>
        <a href="#footer">푸터 영역 바로가기</a>
    </div>
    <!-- //skip -->
    
    <main id="main" class="container mt70">
        <?php include "../include/abbHeader.php" ?>
        
        
        <!-- //header -->
        <div class="join__inner ">
            <h2>회원가입</h2>
            <p>회원가입을 위해 아이디와 비밀번호를 등록해주세요.</p>
            
            <div class="join__form">
                <form action="#" name="#" method="post" onsubmit="return joinChecks()">
                    <fieldset>
                        <legend class="blind">회원가입 영역</legend>
                        <div>
                            <label for="memberID"></label>
                            <input type="text" id="memberID" name="memberID" class="inputStyle" placeholder="아이디">
                            <p class="joinChkmsg" id="memberIDComment"></p><!-- 자바스크립트로 red와 green class 추가 하기  -->
                        </div>
                        <div>
                            <label for="youPass"></label>
                            <input type="password" id="youPass" name="youPass" class="inputStyle" placeholder="비밀번호">
                            <p class="joinChkmsg" id="youPassComment"></p>
                        </div>
                        <div>
                            <label for="youPassC"></label>
                            <input type="password" id="youPassC" name="youPassC" class="inputStyle" placeholder="비밀번호 확인">
                            <p class="joinChkmsg" id="youPassCComment"></p>
                        </div>
                        <div>
                            <label for="youName"></label>
                            <input type="text" id="youName" name="youName" class="inputStyle" placeholder="이름">
                            <p class="joinChkmsg" id="youNameComment"></p>
                        </div>
                        <div>
                            <label for="youPhone"></label>
                            <input type="text" id="youPhone" name="youPhone" class="inputStyle" placeholder="휴대폰번호">
                            <span id="chkPhone"></span>
                            <p class="joinChkmsg" id="youPhoneComment"></p>
                        </div>
                        <div>
                            <label for="nickName"></label>
                            <input type="text" id="nickName" name="nickName" class="inputStyle" placeholder="닉네임">
                            <span id="chkNickName"></span>
                            <p class="joinChkmsg" id="nickNameComment"></p>
                        </div>
                        <div>
                            <label for="youBirth"></label>
                            <input type="text" id="youBirth" name="youBirth" class="inputStyle" placeholder="생년월일">
                            <p class="joinChkmsg" id="youBirthComment"></p>
                        </div>
                        <div> 
                            <label for="youGender"></label>
                            <select type="text" id="youGender" name="youGender" class="inputStyle" placeholder="성별">
                                <option value="">성별 선택</option>
                                <option value="남">남</option>
                                <option value="여">여</option>
                                <p class="joinChkmsg" id="youGenderComment"></p>
                            </select>
                        </div>
                        
                        <button type="submit" class="btnStyle3">회원가입 완료</button>
                    </fieldset>
                </form>
            </div>
        </div> 
    </main>
    <!-- main -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function joinChecks(){
        
            // 아이디 유효성 검사
            let getmemberID =  RegExp(/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([\-.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i);
            if($("#memberID").val() == ''){
                $("#memberIDComment").text("* 아이디를 입력해주세요!");
                $("#memberID").focus();
                $("#memberIDComment").addClass("red");
                return false;
            }else if(!getmemberID.test($("#memberID").val())){
                $("#memberIDComment").text("* 아이디 형식에 맞게 작성해주세요!");
                $("#memberID").val('');
                $("#memberID").focus();
                $("#memberIDComment").removeClass("green");
                $("#memberIDComment").addClass("red");
                return false;
            }else{
                $("#memberIDComment").text("* 사용가능합니다!");
                $("#memberIDComment").removeClass("red");
                $("#memberIDComment").addClass("green");
            }
         
            //비밀번호 유효성 검사
            if($("#youPass").val() == ''){
                $("#youPassComment").text("* 비밀번호를 입력해주세요.");
                $("#youPass").focus();
                $("#youPassComment").addClass("red");
                return false;
            }
            //8자~20자이내, 공백X, 영문, 숫자, 특수문자
            let getYouPass = $("#youPass").val();
            let getYouPassNum = getYouPass.search(/[0-9]/g);
            let getYouPassEng = getYouPass.search(/[a-z]/ig);
            let getYouPassSpe = getYouPass.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);
            if(getYouPass.length < 8 || getYouPass.length > 20){
                $("#youPassComment").addClass("red");
                $("#youPassComment").text("8자리 ~ 20자리 이내로 입력해주세요~");
                return false;
            } else if (getYouPass.search(/\s/) != -1){
                $("#youPassComment").text("비밀번호는 공백없이 입력해주세요!");
                return false;
            } else if (getYouPassNum < 0 || getYouPassEng < 0 || getYouPassSpe < 0 ){
                $("#youPassComment").addClass("red");
                $("#youPassComment").text("영문, 숫자, 특수문자를 혼합하여 입력해주세요!");
                return false;                
            } else {
                $("#youPassComment").removeClass("red");
                $("#youPassComment").addClass("green");
                $("#youPassComment").text("* 사용가능합니다!");
            }
            // 비밀번호 확인 유효성 검사
            if($("#youPassC").val() == ''){
                $("#youPassCComment").addClass("red");
                $("#youPassCComment").text("* 확인 비밀번호를 입력해주세요!");
                $("#youPassC").focus();
                return false;
            }
            // 비밀번호 동일한지 체크
            if($("#youPass").val() !== $("#youPassC").val()){
                $("#youPassCComment").addClass("red");
                $("#youPassCComment").text("* 비밀번호가 일치하지 않습니다.");
                return false;
            }else if ($("#youPass").val() == $("#youPassC").val()){
                $("#youPassCComment").removeClass("red");
                $("#youPassCComment").addClass("green");
                $("#youPassCComment").text("* 사용가능합니다!");
            } 
            //이름 유효성 검사
            if($("#youName").val() == ''){
                $("#youNameComment").addClass("red");
                $("#youNameComment").text("* 이름을 입력해주세요.");
                $("#youName").focus();
                return false;
            }
            let getYouName = RegExp(/^[가-힣]+$/);
            if(!getYouName.test($("#youName").val())){
                $("#youNameComment").text("* 이름은 한글만 사용 가능합니다.");
                $("#youNameComment").addClass("red");
                $("#youName").val('');
                $("#youName").focus();
                return false;
            } else {
                $("#youNameComment").text($("#youName").val()+"님 어서오세요!");
                $("#youNameComment").removeClass("red");
                $("#youNameComment").addClass("green");
            }
            //연락처 유효성 검사
            if($("#youPhone").val() == ''){
                $("#youPhoneComment").text("* 확인 비밀번호를 입력해주세요!");
                $("#youPhone").focus();
                $("#youPhoneComment").addClass("red");
                return false;
            }
            let getYouPhone = RegExp(/01[016789]-[^0][0-9]{2,3}-[0-9]{3,4}/);
            if(!getYouPhone.test($("#youPhone").val())){
                $("#youPhoneComment").text("* 휴대폰 번호가 정확하지 않습니다. (000-0000-0000)");
                $("#youPhone").val('');
                $("#youPhone").focus();
                $("#youPhoneComment").addClass("red");
                return false;
            }
            // 닉네임 유효성 검사
            if($("#nickName").val() == ''){
                $("#nickNameComment").text("* 닉네임을 입력해주세요!");
                $("#nickName").focus();
                $("#nickNameComment").addClass("red");
                return false;
            }
            let getnickName = RegExp(/^[가-힣|0-9]+$/);
            if(!getnickName.test($("#nickName").val())){
                $("#nickNameComment").text("* 닉네임은 한글 또는 숫자만 사용 가능합니다.");
                $("#nickNameComment").addClass("red");
                $("#nickName").val('');
                $("#nickName").focus();
                return false;
            } else {
                $("#nickNameComment").removeClass("red");
                $("#nickNameComment").addClass("green");
                $("#nickNameComment").text("* 사용가능한 닉네임입니다!");
            }
            //생년월일 유효성 검사
            if($("#youBirth").val() == ''){
                $("#youBirthComment").text("* 생년월일을 입력해 주세요");
                $("#youBirthComment").addClass("red");
                $("#youBirth").focus();
                return false;
            }
            let getYouBirth = RegExp(/^(19[0-9][0-9]|20\d{2})-(0[0-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/);
            if(!getYouBirth.test($("#youBirth").val())){
                $("#youBirthComment").text("* 생년월일 형식이 정확하지 않습니다. (YYYY-MM-DD)");
                $("#youBirthComment").addClass("red");
                $("#youBirth").val('');
                $("#youBirth").focus();
                return false;
            } else {
                $("#nickNameComment").removeText(".text");
            }           
            return false;
        }
    </script>
</body>
</html>