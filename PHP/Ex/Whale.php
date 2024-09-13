<?php
// class : 동종의 객체들을 모아 정의한것
// 관습적으로 파일명과 클래스명을 동일하게 지어준다.
class Whale {
    // --------------------
    // 프로퍼티 
    // --------------------
    // 접근 제어 지시자
    // public : Class 내/외부 어디에서나 접근 가능
    // public $name = "고래";
    // private : Class 내부에서만 접근 가능
    private $age = 30;
    // protected : Class 내부 및 상속관계에서 접근 가능 (외부에서 접근 불가)
    protected $gender;



    // 메소드(method)
    function breath() {
        echo "숨을쉽니다.";
    }

    function info() {
        // $this : class 내의 포러퍼티나 메소드에 접근하기위해 사용
        echo "나이는".$this->age;
    }

    // static 메소드
    public static function myStatic() {
        echo "스테틱 메소드";
    }
}

