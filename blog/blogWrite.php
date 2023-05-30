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
    <title>블로그</title>
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
        </div>
            
            
    
            <div class="board__inner">
                <div class="blog__write">
                    <form action="blogWriteSave.php" name="blogWriteSave" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend class="blind">게시글 작성하기</legend>
                            <div>
                                <label for="blogCategory">카테고리</label>
                                <select name="blogCategory" id="blogCategory">
                                    <option value="javascript">javascript</option>
                                    <option value="jquery">jquery</option>
                                    <option value="react">react</option>
                                    <option value="html">html</option>
                                    <option value="css">css</option>
                                </select>
                            </div>
                            <div>
                                <label for="blogTitle">제목</label>
                                <input type="text" id="blog__title" name="blogTitle" class="inputStyle" required>
                            </div>
                            <div>
                                <label for="blogContents">내용</label>                                
                                <textarea name="blogContents" id="blogContents" rows="20" class="inputStyle" rows="20" required></textarea>
                                <!-- <div id="editor"></div> -->
                            </div>
                            <div class="mt30">
                                <label for="blogFile">파일</label>
                                <input type="file" name="blogFile" id="blogFile" accept=".jpg, jpeg, .png, .gif" placeholder="jpg, gif, png 파일만 넣을 수 있습니다. 이미지 용량은 1메가를 넘길 수 없습니다.">
                            </div>
                            <button type="submit" class="btnStyle3">저장하기</button>
                        </fieldset>
                    </form>
                </div>
             </div>
        </div>        
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    
    <script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>
	<script>
		const Editor = toastui.Editor;
	
		const editor = new Editor({
			  el: document.querySelector('#editor'),
			  height: '600px',
			  initialEditType: 'markdown',
			  previewStyle: 'vertical'
			});
		
		seeHtml = function(){
			alert(editor.getHTML());
		}
		seeMd = function(){
			alert(editor.getMarkdown());
		}
	</script>
    
</body>
</html>