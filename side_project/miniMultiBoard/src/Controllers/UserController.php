<?php

namespace Controllers;

use Controllers\Controller;
use Lib\UserValidator;
use Models\User;


class UserController extends Controller {
    protected function goLogin() {
        return 'login.php';
    }

    protected function login() {
        // 유저 입력 정보를 획득
        $requestData = [
            'u_email' => $_POST['u_email']
            ,'u_password' => $_POST['u_password']
        
        ];

        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
        if(count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
            return 'login.php';
        }

        // 유저정보를 획득
        $userModel = new User();
        $prepare = [
            'u_email' => $requestData['u_email']
        ];
        $resultUserInfo = $userModel->getUserInfo($prepare);

        // var_dump($resultUserInfo);
        // var_dump(password_hash($requestData['u_password'], PASSWORD_DEFAULT));
        // exit;

        // 유저 존재 유무 체크
        if(!$resultUserInfo) {
            $this->arrErrorMsg[] = '존재하지 않는 유저입니다.';
        } else if (!password_verify($requestData['u_password'], $resultUserInfo['u_password'])) {
            // 패스워드 체크
            $this->arrErrorMsg[] = '패스워드가 일치하지 않습니다.';
            return 'login.php';
        }

        // 세션에 u_id 저장
        $_SESSION['u_email'] = $resultUserInfo['u_email'];


        // 로케이션 처리
        return 'Location: /boards';
    }
}