<?php
// foreach문 : 배열을 편하게 루프하기 위한 반복문
// $arr = [1, 2, 3];
// foreach($arr as $key => $val) {
//     echo "key : ".$key.", value : ".$val."\n";
// }

// 아래 arr2를 이용해서 구구단 2단 찍어주세요.
// $arr2 = [1, 2, 3, 4, 5, 6, 7, 8, 9];
// foreach($arr2 as $val) {
//     echo "2 X ".$val." = ".(2*$val)."\n";
// }

// 연관배열의 경우
$arr3 = [
    "name" => "meerkat"
    ,"age" => 20
    ,"gender" => "M"
];

foreach($arr3 as $key => $val) {
    echo $key. " : ".$val."\n";
}
