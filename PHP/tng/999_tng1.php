<?php

// for($dan = 2; $dan <= 9; $dan++) {

//     echo "**** ".$dan."단 ****\n";

//     for($num = 1 ; $num <= 9; $num++) {
//         echo $dan." X ".$num." = ".$dan * $num."\n";
//     }
    
// }

// // --------------------
// // function
// // 두수를 더해서 반환하는 함수

// function my_sum(int $num1, int $num2 = 10): int { //타입힌트
//     return $num1 + $num2;
// }

// echo my_sum(1);

// -------------------
// 예외 처리

// try {
//     // 처리하고자 하는 로직
//     5 / 0;
// } catch(Throwable $th) {
//     // 예회 발생시 할 처리
//     echo $th->getMessage();
// } finally {
//     // 에외의 발생 여부와 상관없이 항상 실행 할 처리
//     echo "파이널리";
// }

// echo "처리끝";


// try {
//     echo "바깥쪽 try\n";

//     try {
//         5/0;
        
//         echo "안쪽 try\n";
//     } catch(Throwable $th) {
//         echo "안쪽 catch\n";
//         5/0;
//     }

// } catch(Throwable $th) {

//     echo "바깥쪽 catch\n";
// }

// ------------------
// 강제 예외 발생
try{
    throw new Exception("강제예외 발생");
}catch(Throwable $th) {
    echo $th->getMessage();
}