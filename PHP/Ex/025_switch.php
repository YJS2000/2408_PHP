<?php

// switch 문

$food = "마제소바";

// if($food === "떡볶이") {
//     echo "한식";
// }else if($food === "짜장면") {
//     echo "중식";
// }else if($food === "햄버거") {
//     echo "양식";
// }

// switch 문 1대1로 검증할때 자주사용
// switch($food) {
//     case "떡볶이":
//         echo "한식";
//         break; // break 생략시 다음처리도 계속 이어진다.
//     case "짜장면":
//         echo "중식";
//         break;
//     case "햄버거":
//         echo "양식";
//         break;
//     default: 
//         echo "맛있음";
//         break;
// }

$rank = "5등";

switch($rank) {
    case "1등":
        echo "금상";
        break; 
    case "2등":
        echo "은상";
        break;
    case "3등":
        echo "동상";
        break;
    case "4등":
        echo "장려상";
        break;
    default:
        echo "노력상";
        break;
}



