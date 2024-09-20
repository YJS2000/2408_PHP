<?php
// 가위 바위 보 게임
// 게임 실행시, "가위", "바위", "보" 중 하나를 입력
// 컴퓨터는 랜덤으로 "가위" "바위" "보"중 하나를 출력
// 결과를 출력한다
// 유저 : 가위
// 컴퓨터 : 바위
// 졌습니다 or 이겼습니다.


fscanf(STDIN, "%s\n", $input);
echo $input;

var_dump($input);

$random = random_int(1,3);
if($random === 1) {
    $computer = "scissors";
} else if ($random ===2) {
    $computer = "rock";
} else {
    $computer = "paper";
}

echo "유저 : ".$input."\n";
echo "컴퓨터 : ".$computer."\n";

if($computer === $input) {
    echo "비겼습니다.";
} else if($computer === "scissors" && $input === "rock") {
    echo "이겼습니다.";
} else if($computer === "scissors" && $input === "paper") {
    echo "졌습니다.";
} else if($computer === "rock" && $input === "scissors") {
    echo "졌습니다.";
} else if($computer === "rock" && $input === "paper") {
    echo "이겼습니다.";
} else if($computer === "paper" && $input === "scissors") {
    echo "이겼습니다.";
} else {
    echo "졌습니다.";
}



