<?php

// 변수 (Variable)
$dan = 6;

echo "$dan X 1 = 2 \n";
echo "$dan X 2 = 4 \n";
echo "$dan X 3 = 6 \n";
echo "$dan X 4 = 8 \n";
echo "$dan X 5 = 10 \n";

// 변수 선언
$num;

// 변수초기화 
$num = 1;

// 변수선언 및 초기화
$str = "가나다";

//  --------------
// 네이밍 기법
// 스네이크 기법
$user_name;

// 카멜 기법
$suerName;

// ---------------
// 상수 (constants) : 절때 변하지 않는값
define("AGE", 20);
echo AGE;
// define("AGE", 20); // 이미 선언된 상수이므로 Warning이 일어나고 값이 바꾸지 않는다.

$name = "미어캣";
echo $name;
$name = "고양이";
echo $name;

// underscore 표기법
$num = 10_000_000;
echo $num."\n";

// 아래처럼 변수 값을 답아서 출력해 주세요
// 점심메뉴
// 탕수육 8,000
// 짜장면 6,000
// 짬뽕 6,000

$lunch = "점심메뉴\n";
$tang = "탕수육 8,000\n";
$jja = "짜장면 6,000\n";
$jjam = "짬뽕 6,000\n";

echo $lunch;
echo $tang;
echo $jja;
echo $jjam;

// 두 변수의 스왑
$num1 = 200;
$num2 = 10;
$tmp;

$tmp = $num1;
$num1 = $num2;
$num2 = $tmp;
echo $num1, $num2;

// ---------------------
// 데이터 타입
// ---------------------
// int : 정수
$num = 1;
var_dump($num);

// float, double 실수
$doubel = 3.141592; 
var_dump($doubel);

// string : 문자열
$str = "abc가나다";
var_dump($str);

// boolean : 논리값
$boo = true;
var_dump($boo);

// NULL : 널
$null = null;
var_dump($null);

// array : 배열
$arr = [1,2,3];
var_dump($arr);

// object : 객체
$obj = new datetime();
var_dump($obj);

// 형변환
$casting = (string)$num;
var_dump($casting);
