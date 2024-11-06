<?php

namespace Controllers;

use Controllers\Controller;
use Models\Board;
use Models\BoardsCategory;

class BoardController extends Controller {
    private $arrBoardList = []; //게시글 정보 리스트
    private $boardName = ''; // 게시판 이름
    protected $boardType = ''; // 게시판 코드

    // getter
    public function getArrboardList() {
        return $this->arrBoardList;
    }
    public function getBoardName() {
        return $this->boardName;
    }

    // setter
    public function setArrboardList($arrBoardList) {
        $this->arrBoardList = $arrBoardList;
    }
    public function setBoardName($boardName) {
        $this->boardName = $boardName;
    }


    public function index() {
        // 보드타입 획득
        $requstData = [
            'bc_type' => isset($_GET['bc_type']) ? $_GET['bc_type'] : '0'
        ];
        $this->boardType = $requstData['bc_type'];

        // 게시글 정보 획득
        $boardModel = new Board();
        $this->setArrboardList($boardModel->getboardList($requstData));

        // 보드이름 획득
        $boardCategoryModel = new BoardsCategory();
        $resultBoardCategory = $boardCategoryModel->getBoardName($requstData);
        $this->setBoardName($resultBoardCategory['bc_name']);



        return 'board.php';
    }
    
    // 상세페이지
    public function show() {
        $requstData = [
            'b_id' => $_GET['b_id']
        ];

        // 게시글 정보 조회
        $boardModel = new Board();
        $resultBoard = $boardModel->getBoardDetail($requstData);

        // JSON 변환
        $responseData = json_encode($resultBoard);

        header('Content-type: application/json');
        echo $responseData;
        exit;
    }

    // 작성페이지로 이동
    public function create() {
        return 'insert.php';
    }

    // 작성 처리
    public function store() {
        $requstData = [
            'b_title' => $_POST['b_title']
            ,'b_content' => $_POST['b_content']
            ,'b_img' => ''
        ];
        $requstData['b_img'] = $this->saveImg($_FILES['file']);
    }

    private function saveImg($file) {
        $type = explode('/', $file['type']); // ['IMAGE', '확장자]
        $fileName = uniqid().'.'.$type[1]; // 3g65gw46g.확장자
        $filePath = _PATH_IMG.'/'.$fileName;    // /view/img/3g65gw46g.확장자
        move_uploaded_file($file['tmp_name'], _ROOT.$filePath); // 파일복사

        return $filePath;

    }
}
