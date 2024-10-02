
<?php 
    require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
    require_once(MY_PATH_DB_LIB);
    $value = null;
    $num = 0;

    if(strtoupper($_SERVER["REQUEST_METHOD"]) === "POST") {
       
        $num = $_POST["num"];
        $reps = $_POST["reps"];

        $value = $num * (36/(37-$reps));
    }
    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/calculating.css">
    <title>1rm 계산</title>
</head>
<body> 
    <main class="main-info">

       
        <p class="text1">1rm 계산기</p>
        <p class="text2">1rm 이란? 본인이 정확한 운동 동작을 사용해서 <br> 1회들어올릴수 있는 무게의 최대치</p>
       
        <form action="/calculating.php" method="POST">
            <div class = "main-calculating">

                <div class="calculating">
                    <p>무게(kg)</p>
                    <input value="<?php echo $num ?>" class="weight" type="number" name="num">
                </div>
                

                <div class = "calculating">
                    <p>반복횟수</p> 
                        <select class="reps" name="reps">
                            <option value="1">1회 반복</option>
                            <option value="2">2회 반복</option>
                            <option value="3">3회 반복</option>
                            <option value="4">4회 반복</option>
                            <option value="5">5회 반복</option>
                            <option value="6">6회 반복</option>
                            <option value="7">7회 반복</option>
                            <option value="8">8회 반복</option>
                            <option value="9">9회 반복</option>
                            <option value="10">10회 반복</option>
                        </select>                       
                </div>
                
            </div>

            <div class="button-cal">
                <button type="submit">1rm 계산</button>
            </div>
        </form>
       
        <div class="answer-list">
            <p>당신의 1rm</p>
            <div class="answer"><?php echo floor((int)$value)."kg 입니다"?></div>
        </div>

        <div class="button-cal">
            <a href="/index.php?page=<?php echo $page ?>"><button type="button">뒤로 가기</button></a>
        </div>

    </main>
    
</body>
</html>