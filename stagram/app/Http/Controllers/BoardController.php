<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index() {
        $boardList = Board::orderBy('created_at', 'DESC')->paginate(6);
        
        $responseData = [
            'success' => true
            ,'msg' => '게시글 획득 성공'
            ,'boardList' => $boardList->toArray()
        ];
        return response()->json($responseData,200);
    }

    public function show($id) {
        $board = Board::with('user')
                        ->find($id);

        $responseData = [
            'success' => true
            ,'msg' => '상세 정보 획득 성공'
            ,'board' => $board->toArray()
        ];

        return response()->json($responseData, 200);
    }

    public function store(Request $request) {
        // TODO 유효성 체크 넣기
        
        $insertData = $request->only('content');
        // 로그인 기능을 만들지않아 일단 user_id = 1로 설정
        $insertData['user_id'] = '1';
        $insertData['img'] = '/'.$request->file('file')->store('img');

        // 데이터 인서트
        $board = Board::create($insertData);

        $responseData = [
            'success'=> true
            ,'msg' => '게시글 작성 성공'
            ,'board' => $board->toArray()
        ];

        return response()->json($responseData, 200);
    }

    public function deleteBoard($id) {

        Board::destroy($id);
        return response()->json([
            'message' => '게시글이 삭제되었습니다.',
            'status' => 'success'
        ], 200);
        

    }

}
