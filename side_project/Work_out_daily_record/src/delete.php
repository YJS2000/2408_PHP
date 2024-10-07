<?php
      require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
      require_once(MY_PATH_DB_LIB);
      $conn = null;
    
      try{
        if(strtoupper($_SERVER["REQUEST_METHOD"]) === "GET") {
            
            $id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;
            $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

            if($id < 1) {
                throw new Exception("파라미터 이상 GET");
            }
            $conn = my_db_conn();

            $arr_prepare = [
                "id" => $id
            ];

            $result = my_board_select_id($conn, $arr_prepare);
        }
        if(strtoupper($_SERVER["REQUEST_METHOD"]) === "POST") {
            $id = isset($_POST["id"]) ? (int)$_POST["id"] : 0;
            $page = isset($_POST["page"]) ? (int)$_POST["page"] : 0;
            if($id < 1) {
                throw new Exception("파라미터 이상 POST");
            }

           
            $conn = my_db_conn();
            // 트랜잭션 시작
            $conn->beginTransaction();
            $arr_prepare = [
                "id" => $id
            ];

            my_board_delete_id($conn, $arr_prepare);

            // commit 
            $conn->commit();

            header("Location: /?page=".$page);

            exit;
        }

      } catch(Throwable $th) {
            if(!Is_null($conn) && $conn->inTransaction()) {
            $conn->rollBack();
        }
        echo $th->getMessage();
        exit;
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/delete.css">
    <link rel="stylesheet" href="./css/common.css">
    <title>삭제페이지</title>
</head>
<body>
    <div class="main-info">

        <div class="img-center">
            <a href="/index.php"><img src="./css/pngegg.png" alt="덤벨"></a>
            <h2>정말 삭제하시겠습니까?</h2>
        </div>

        <div class="content-box">
            <p>운동 종목</p>
            <div class="content1"><?php echo $result["title"] ?></div>
            <p>운동 내용</p>
            <div class="content2"><?php echo $result["content"] ?></div>
        </div>

    <div class="main-top"> 
        <form action="/delete.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id?>">
            <input type="hidden" name="page" value="<?php echo $page?>">

            <button type="submit" class="button-top">삭제</button>
            <a href="/detail.php?id=<?php echo $id?>&page=<?php echo $page; ?>"><button type="button" class="button-top">뒤로가기</button></a>
        </form>
    </div>

</body>