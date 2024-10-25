<?php
namespace PHP\OOP;
require_once('./Mammal.php');
require_once('./Pet.php');

use PHP\oop\Mammal;
use PHP\oop\Pet;

class FlyingSquirrel extends Mammal implements Pet {
    // 비행 메소드
    public function flying() {
        return '날아갑니다.';
    }

    // 오버라이딩
    public function printInfo(){
        return '룰루랄라';
        // return parent::printInfo()."룰루랄라";
    }
    
    public function printPet(){
        return '펫입니다 찍찍';
    }
}