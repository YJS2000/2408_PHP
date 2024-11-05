<?php

namespace Route;

use Controllers\BoardController;

use Controllers\UserController;

// 라우트 : 유저의 요청을 분석해서 해당 Controller로 연결해주는 클래스
class Route {
    //생성자
    public function __construct() {
        $url = $_GET['url']; // 요청경로획득
        $httpMethod = $_SERVER['REQUEST_METHOD']; //http 메소드 획득

        // 요청 경로를 체크
        if($url === 'login') {
            // 회원 로그인 관련
            if($httpMethod === 'GET') {
                new UserController('goLogin');
            } else if($httpMethod === 'POST') {
                new UserController('login');
            }
        } else if($url === 'boards') {
            if($httpMethod === 'GET') {
                new BoardController('index');
            }
        }

    }
}