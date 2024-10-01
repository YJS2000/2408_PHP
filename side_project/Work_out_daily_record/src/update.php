<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
    require_once(MY_PATH_DB_LIB);
    $conn = null;

    try {
        if(strtoupper($_SERVER["REQUEST_METHOD"]) === "GET") {
            $id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;
            $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

            if($id < 1) {
                throw new Exception("파라미터 오류 GET");
            }

            $conn = my_db_conn();

            $arr_prepare = [
                "id" => $id
            ];
 
            $result =  my_board_select_id($conn, $arr_prepare);
        } 
        if(strtoupper($_SERVER["REQUEST_METHOD"]) === "POST") {
            $id = isset($_POST["id"]) ? (int)$_POST["id"] : 0;
            var_dump($id);
            $page = isset($_POST["page"]) ? (int)$_POST["page"] : 1;
            $title = isset($_POST["title"]) ? $_POST["title"] : "";
            $content = isset($_POST["content"]) ? $_POST["content"] : "";

            if($id < 1 || $title === "") {
                throw new Exception("파라미터 오류 POST");
            }

            $conn = my_db_conn();
        
            $conn->beginTransaction();

            $arr_prepare = [
                "id" => $id
                ,"title" => $title
                ,"content" => $content
            ];

            my_board_update($conn, $arr_prepare);

            $conn->commit();

            header("Location: /detail.php?id=".$id."&page=".$page);
            exit;
        }

    } catch(Throwable $th) {
        
        echo $th->getMessage();
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/update.css">
    <link rel="stylesheet" href="./css/common.css">
    <title>수정페이지</title>
</head>
<body>
    <div class="main-info">

        <div class="update-text">
            <p class="update-workout">운동 수정</p>
        </div>
        <form action="/update.php" method="POST">
            
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="page" value="<?php echo $page ?>">
            
            <div class="content-box">
                <p>운동 종목</p>
                <textarea name="title" id="title" placeholder="운동 종목"></textarea>
                <p>운동 내용</p>
                <textarea name="content" id="content" placeholder="값을 입력하세요"></textarea>
            </div>

            <div class="main-top"> 
                <button type="submit" class="button-top">수정</button>
                <a href="./detail.php?id=<?php echo $result["id"] ?>&page=<?php echo $page ?>"><button type="button" class="button-top">뒤로가기</button></a>
            </div>
        </form>
    </div>
</body>
</html>