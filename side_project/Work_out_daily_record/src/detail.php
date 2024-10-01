<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
    require_once(MY_PATH_DB_LIB);

    $conn = null;

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

    } catch(Throwable $th) {
        echo $th->getMessage();
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
            <img src="./css/pngegg.png" alt="덤벨">
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

</body>
</html>