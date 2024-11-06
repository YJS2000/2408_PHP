<?php

namespace Lib;

class Auth {
    public static function chkAuthorization() {
        $arrNeedAuth = [
            'boards'
            ,'boards/detail'
            ,'boards/insert'
        ];

        $url = $_GET['url'];

        // 접속 권한이 없는 페이지 접속 차단 (로그인 페이지로 이동)
        if(!isset($_SESSION['u_email']) && in_array($url, $arrNeedAuth)) {
            header('Location: /login');
            exit;
        }

        // 로그인 상태에서 로그인 페이지 접속시 자유게시판(/boards)으로 이동
        if(isset($_SESSION['u_email']) && ($url === 'login' || $url === 'regist')) {
            header('Location: /boards');
            exit;
        }

    }
}