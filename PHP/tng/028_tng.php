<?php

// 1. 3의 배수게임 
// 출력 예) 1, 2, 짝, 4, 5, 짝, 7, 8, 짝 ,10 ...
// for($a = 1; $a <= 100; $a++){
//     if(($a%3) === 0){
//         echo "짝, ";
//     }
//     if(($a%3) !== 0){
//         echo $a.", ";
//     }
// }

// 2 반복문을 이용하여 급여가 5000이상이고, 성별이 남자인 사원의 id와 이름을 출력해주세요.
// 출력 예)
// id : 1, name : 미어캣
// id : 2, name : 홍길동

$arr = [ 
    ["id" => 1, "name" => "미어캣", "gender" => "M", "salary" => "6000"]
    ,["id" => 2, "name" => "홍길동", "gender" => "M", "salary" => "3000"]
    ,["id" => 3, "name" => "갑순이", "gender" => "F", "salary" => "10000"]
    ,["id" => 4, "name" => "갑돌이", "gender" => "M", "salary" => "8000"]
];

foreach($arr as $key => $item) {
    if($item["gender"] === "M" && $item["salary"] >= "5000" ) {
        echo "id : ".$item["id"].", name : ".$item["name"]."\n";
    }
}