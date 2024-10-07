<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
    require_once(MY_PATH_DB_LIB);

    $conn = null;

    if(strtoupper($_SERVER["REQUEST_METHOD"]) === "GET") {
        try {
            $id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;
            $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

            if($id < 1) {
                throw new Exception("파라미터오류");
            }

            $conn = my_db_conn();
            $arr_prepare = [
                "id" => $id
            ];

            $result = my_board_select_id($conn, $arr_prepare);
            $result2 = my_title_select_id($conn, $arr_prepare);

        } catch(Throwable $th) {
            echo $th->getMessage();
            exit;
        }
    }
    

    if(strtoupper($_SERVER["REQUEST_METHOD"]) === "POST") {
        try{
            $page = $_POST["page"];
            $conn = my_db_conn();
            $id = $_POST["id"];

            $arr_prepare = [
                "id" => $id
                ,"nickname" => $_POST["nickname"]
                ,"comment_title" => $_POST["comment"]
            ];
            
            $conn->beginTransaction();

            my_title_insert($conn, $arr_prepare);

            $conn->commit();

            $arr_prepare = [
                "id" => $id
            ];

            $result = my_board_select_id($conn, $arr_prepare);
            $result2 = my_title_select_id($conn, $arr_prepare);

        }catch(Throwable $th) {
            echo $th->getMessage();
            exit;
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/detail.css">
    <link rel="stylesheet" href="./css/common.css">
    <title>상세페이지</title>
</head>
<body>
    <div class="main-info">

        <div class="img-center">
            <a href="/index.php"><img src="./css/pngegg.png" alt="덤벨"></a>
        </div>

        <div class="content-box">
            <p>운동 종목</p>
            <div class="content1"><?php echo $result["title"] ?></div>
            <p>운동 내용</p>
            <div class="content2"><?php echo $result["content"] ?></div>
        </div>

        <div class="main-top"> 
                <a href="/update.php?id=<?php echo $result["id"] ?>&page=<?php echo $page ?>"><button type="button" class="button-top">수정</button></a>
                <a href="/delete.php?id=<?php echo $result["id"] ?>&page=<?php echo $page ?>"><button type="button" class="button-top">삭제</button></a>
                <a href="/index.php?page=<?php echo $page ?>"><button class="button-top">뒤로가기</button></a>
        </div>
    </div>

    <!-- 댓글 기능  -->

    <div class="comment-main">

        <form method="POST" action="/detail.php">
            <div class="comment_top">
                <span>ID : </span>
                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="hidden" name="page" value="<?php echo $page ?>">
                <input required class="text1" type="text" name="nickname">
                <button type="submit" class="comment-btn">댓글 쓰기</button>
                <input required class="text2" type="text" name="comment">
            </div>
        </form>
            

        <div class="comment-main">
            <?php foreach($result2 as $item) {  ?>
                <div class="comment_top">
                    <span>ID : </span>
                    <span><?php echo $item["nickname"] ?></span>
                    <span>DATE : </span>
                    <span><?php echo $item["created_at"] ?></span>
                </div>
                <div class="text2 text3"><?php echo $item["comment_title"] ?></div>
            <?php } ?>    
        </div>
    </div>

</body>
</html>