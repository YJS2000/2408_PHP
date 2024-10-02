<?php
      require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
      require_once(MY_PATH_DB_LIB);
      $conn = null;

      if(strtoupper($_SERVER["REQUEST_METHOD"]) === "POST") {
        try{
            $conn = my_db_conn();

            $arr_prepare = [    
                "title" => $_POST["title"]
                ,"content" => $_POST["content"]
            ];

            // 트랜잭션 시작
            $conn->beginTransaction();
            my_board_insert($conn, $arr_prepare);

            $conn->commit();

            header("Location: /");
            exit;

        } catch (Throwable $th) {
            if(!is_null($conn)) {
                $conn->rollBack();
            }
        }
        echo $th->getMessage();
        exit;
      }

      $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/insert.css">
    <link rel="stylesheet" href="./css/common.css">
    <title>작성페이지</title>
</head>
<body>
    <div class="main-info">

        <div class="img-center">
            <img src="./css/pngegg.png" alt="덤벨">
            <h2>운동 일지 작성</h2>
        </div>

        
        <form action="/insert.php" method="post">
            <div class="content-box">
                <p>운동 종목</p>
                <textarea required name="title" id="title" placeholder="운동종목"></textarea>
                <p>운동 내용</p>
                <textarea required name="content" id="content" placeholder="값을 입력하세요"></textarea>
            </div>
    

            <div class="main-top"> 
                    <button type="submit" class="button-top">확인</button>
                    <a href="/index.php?page=<?php echo $page ?>"><button type="button" class="button-top">뒤로가기</button></a>
            </div>
        </form>

</body>