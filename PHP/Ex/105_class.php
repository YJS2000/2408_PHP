<?php

require_once("./Whale.php");

// 인스턴스화 : 작성한 class를 사용하기 위해 객체로 만드는 과정
// $whale = new Whale();

// Class의 메소드 사용
// $whale->breath();

// echo $whale->name; // public이므로 접근 가능
// // echo $whale->age; // private이므로 접근불가
// echo $whale->info();

// 스태틱 멤버에 접근
// Whale::myStatic();

require_once("./Shark.php");
// 상어 클래스 
$shark = new Shark("상어");
echo $shark->name;