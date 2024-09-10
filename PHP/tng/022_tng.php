<?php
// IF로 만들어주세요.
// 성적
// 범위 :
//      100   : A+
//      90이상 100미만 : A
//      80이상 90미만 : B
//      70이상 80미만 : C
//      60이상 70미만 : D
//      60미만: F
// 출력 문구 : "당신의 점수는 XXX점 입니다. <등급>"

$rank = 90;

if($rank === 100) {
    echo "당신의 점수는 $rank 점 입니다 A+";
} else if ($rank >= 90 && $rank < 100) {
    echo "당신의 점수는 $rank 점 입니다 A";
} else if ($rank >= 80 && $rank < 90) {
    echo "당신의 점수는 $rank 점 입니다 B";
} else if ($rank >= 70 && $rank < 80) {
    echo "당신의 점수는 $rank 점 입니다 C";
} else if ($rank >= 60 && $rank < 70) {
    echo "당신의 점수는 $rank 점 입니다 D";
} else {
    echo "당신의 점수는 $rank 점 입니다 F";
}