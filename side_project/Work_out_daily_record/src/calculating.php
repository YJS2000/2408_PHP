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
       
 
        <div class = "main-calculating">

            <div class="calculating">
                <p>무게</p>
                <form method="get" action="/cal_test.php">
                    <input class="weight" type="text" name="num">

            </div>
            

            <div class="calculating">
                <p>반복횟수</p>
                    <select class = "reps" name="reps">
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
       
        <div class="answer-list">
            <p>당신의 1rm</p>
            <div class="answer"></div>
        </div>

        <div class="button-cal">
            <a href="/index.php"><button type="button">뒤로 가기</button></a>
        </div>

        </form>






    </main>
    
</body>
</html>