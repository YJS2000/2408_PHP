<?php
      require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
      require_once(MY_PATH_DB_LIB);
      $conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/insert.css">
    <link rel="stylesheet" href="./css/common.css">
    <title>삭제페이지</title>
</head>
<body>
    <div class="main-info">

        <div class="img-center">
            <img src="./css/pngegg.png" alt="덤벨">
            <h2>운동 일지 작성</h2>
        </div>

        

        <div class="content-box">
            <p>운동 종목</p>
            <textarea name="content1" id="content1">운동 종목</textarea>
            <p>운동 내용</p>
            <textarea name="content2" id="content2">값을 입력하세요</textarea>
        </div>

    <div class="main-top"> 
            <button class="button-top">확인</button>
            <a href="/index.html"><button class="button-top">뒤로가기</button></a>
    </div>

</body>