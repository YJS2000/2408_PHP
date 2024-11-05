<?php

namespace Controllers;

use Models\BoardsCategory;

class Controller {
    protected $arrErrorMsg = []; // 화면에 포시할 에러 메세지 리스트
    protected $arrBoardNameInfo = []; // 해더 게시판 드롭다운 리스트

    // 생성자
    public function __construct(string $action) {
        // 세션 시작
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // 유저 로그인 및 권한체크

        // 헤더 드롭다운 리스트
        $boardsCategoryModel = new BoardsCategory();
        $this->arrBoardNameInfo = $boardsCategoryModel->getBoardsNameList();

        // 해당 Action 호출
        $resultAction = $this->$action();

        // view 호출
        $this->callView($resultAction);

        exit; // php 처리 종료
    }

    private function callView($path) {
        if(strpos($path, 'Location:') === 0) {
            header($path);
        } else {
            require_once(_PATH_VIEW.'/'.$path);
        }
    }
}