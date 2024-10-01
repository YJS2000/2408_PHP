<?php
      require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
      require_once(MY_PATH_DB_LIB);
      $conn = null;

      try {
        $conn = my_db_conn();

        $max_board_cnt = my_board_total_count($conn);
        $max_page = (int)ceil($max_board_cnt / MY_LIST_COUNT);
        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
        $offset = ($page - 1 ) * MY_LIST_COUNT;

        $start_page_button_number = (int)(floor(($page-1) / MY_PAGE_BUTTON_COUNT) * MY_PAGE_BUTTON_COUNT) + 1;
        $end_page_button_number = $start_page_button_number + (MY_PAGE_BUTTON_COUNT - 1);

        $end_page_button_number =  $end_page_button_number > $max_page ? $max_page : $end_page_button_number;
        $prev_page_button_number = $page - 1 < 1 ? 1 : $page -1;
        $next_page_button_number = $page + 1 > $max_page ? $max_page : $page + 1;
        // var_dump($end_page_button_number);
        $arr_prepare = [
            "list_cnt" => MY_LIST_COUNT
            ,"offset" => $offset
        ];
        $result = my_board_select_pagination($conn, $arr_prepare);

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
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/common.css">
    <title>리스트페이지</title>
</head>
<body>
    <div class="main-info">
        <header class="header-set">
            <h1>Work out daily record</h1>
        </header>

        <div class="img-center">
            <img src="./css/pngegg.png" alt="덤벨">
        </div>

        <main>
            <div class="main-top"> 

                <div class="main-top1">
                    <a href="/calculating.php?page=<?php echo $page ?>"><button class="button-top">1rm 계산</button></a>
                </div>
                <div class="main-top2">
                    <a href="/insert.php?page=<?php echo $page ?>"><button class="button-top">글 작성</button></a>
                </div>

            </div>

            <div class="item-head">
                <div>글 번호</div>
                <div>운동 종목</div>
                <div>작성 일자</div>
            </div>
            <?php foreach($result as $item) {  ?>
            
                <div class="item">
                    <div><?php echo $item["id"] ?></div>
                    <div><a href="/detail.php?id=<?php echo $item["id"] ?>&page=<?php echo $page ?>"><?php echo $item["title"] ?></a></div>
                    <div><?php echo date("Y-m-d",strtotime($item["created_at"])) ?></div>
                </div>

            <?php } ?>
           
        </main>
        
        <footer class="main-footer">
            <?php if($page !== 1) { ?>
                <a href="/index.php?page=<?php echo $prev_page_button_number ?>"><button class="button-bottom">◀</button></a>
            <?php } ?>
            
            <?php for($i = $start_page_button_number; $i <= $end_page_button_number; ++$i) { ?> 
                <a href="/index.php?page=<?php echo $i ?>"><button class="button-bottom <?php echo $page === $i ? "btn-seleted" : "" ?>"><?php echo $i ?></button></a>  
            <?php } ?>

            <?php if($page !== $max_page) { ?>
                <a href="/index.php?page=<?php echo $next_page_button_number ?>"><button class="button-bottom">▶</button></a> 
            <?php } ?>
        </footer>
        
    </div>
</body>
</html>