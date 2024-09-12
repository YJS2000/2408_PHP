<?php
// 로또 번호 생성기
// 1. 1 ~ 45 번호가 있다.
// 2. 랜덤한 번호6개를 출력한다
//  2-1 단, 번호는 중복되지않는다

// $o = 0;
// $i = 1;
// for($lotto = 1; $lotto <=6; $lotto++) {

//     $i = random_int(1, 45)." ";
//     if($i!= $o) {
//         echo $i." ";
//     } else {
//         continue;
//     }
//     $o = $i;
// }

// $arr = [0, 0, 0, 0, 0, 0];
// foreach($arr as $key => $val) {
//     $i = random_int(1, 45)." ";
//     if($arr != $i) {
//         echo $i." ";
//     }else {
//         // $i = random_int(1, 45)." ";
//         // echo $i." ";
//     }
//     $arr["$key"] = $i;
// }
// $o = 0;
// $i = 1;
// for($lotto = 1; $lotto <=6; $lotto++) {

//     $i = random_int(1, 45)." ";
//     if($i!= $o) {
//         echo $i." ";
//     }
//     else{
//         foreach 
//     }
// }

$rememberNum = [];
$isOverlap = false;
for($i = 0; $i< 6;){
    $num = random_int(1,45);
    $isOverlap = false;
    for($j = 0 ; $j < count($rememberNum); $j++)
    if($num === $rememberNum[$j]){
        $isOverlap = true;
        break;
    }
    if($isOverlap){
        continue;
    }
    $rememberNum[$i] = $num;
    echo $num." ";
    $i ++;
}