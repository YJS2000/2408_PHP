<?php
namespace PHP\oop;
require_once('./Mammal.php');
require_once('./Swim.php');

use PHP\OOP\Mammal;
use PHP\OOP\Swim;

class Whale extends Mammal implements Swim {
    // 수영 메소드
    public function swimming() {
        return '수영합니다.';
    }

    public function printInfo() {
        return '고래고래고래';
    }
}
























// --------------------------------------------------------------

// class Whale {
//     // 프로퍼티 클래스내부에 변수
//     public $name; // 외부에서도 쓸수있음
//     private $age;  // 내부에서만 쓸수있음

//     // 생성자 메소드
//     public function __construct($name, $age){
//         $this->name = $name;
//         $this->age = $age;
//     }

//     // 메소드 클래스내부에 함수
//     public function breath() {
//         return "숨을 쉽니다";
//     }
    
//     public function printInfo() {
//         return $this->name."는 ".$this->age."살 입니다.";
//         // 클래스 내부에서 선언한 변수 쓰려면 $this-> 사용
//     }

//     // getter / setter 메소드
//     public function getAge() {
//         return $this->age;
//     }

//     public function setAge($age) {
//         $this->age = $age;
//     }

//     // static method 
//     public static function dance() {
//          return '고래가 춤을 춥니다.';
//     }
// }

// echo Whale::dance();

// // // Whale Instance
// // $whale = new Whale("핑크고래", 40);
// // echo $whale->printInfo();