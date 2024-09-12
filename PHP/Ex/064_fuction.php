<?php

// 두수를 전달해주면 합을 받환해주는함수

/**
 * 두 수를 더해서 반환
 */
function my_sum($num1, $num2){ //파라미터
    return $num1 + $num2;
}

my_sum(3, 5); // 함수호출 아규먼트


// 두수를 받아서 +, -, *, /, %의 결과를 리턴하는 함수를 만들어 주세요.

function plus($num3, $num4){
    return $num3 + $num4;
} 

function minus($num5, $num6){
    return $num5 - $num6;
} 

function multiply($num7, $num8){
    return $num7 * $num8;
} 

function divide($num9, $num10){
    return $num9 / $num10;
} 

function remain($num11, $num12){
    return $num11 % $num12;
} 
echo multiply(5, 9);
echo "\n";

// ---------------
// 가변 길이 아규먼트

// 전달되는 모든 숫자를 더해서 반환 
// ...을 이용하는방법 (**주의: php5.6이상 에서만 사용가능)
// function my_sum_all(...$numbers){
//     $sum = 0;
//     // foreach($numbers as $val){
//     //     $sum += $val;
//     // }
//     // return $sum;
//     return array_sum($numbers);
// }
// echo my_sum_all(4,5,8,2,3,1);

function my_sum_all(){
    $numbers = func_get_args();
    $sum = 0;
    foreach($numbers as $val){
        $sum += $val;
    }
    return $sum;
}
echo my_sum_all(4,5,8,2,3,1);
