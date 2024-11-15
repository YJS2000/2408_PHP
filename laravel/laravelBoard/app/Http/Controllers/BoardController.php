<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\BoardsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Throwable;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 리스트 페이지 표시
    public function index(Request $request)
    {
        // 게시글 타입 획득
        $bcType = '0';
        if($request->has('bc_type')) {
            $bcType = $request->bc_type;
        }


        // 리스트 데이터 획득
        $result = Board::select('b_id', 'b_title', 'b_content', 'b_img')
                    ->where('bc_type', $bcType)
                    ->orderBy('created_at', 'DESC')
                    ->orderBy('b_id', 'DESC')
                    ->get();

        // 게시판 이름 획득
        $boardInfo = BoardsCategory::where('bc_type', $bcType)->first();

        return view('boardList')
        ->with('data', $result)
        ->with('boardInfo', $boardInfo);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    // 작성 페이지로 이동
    public function create(Request $request)
    {
        return view('boardInsert')->with('bcType', $request->bc_type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 작성처리 (실제로 db에 처리되는것)
    public function store(Request $request)
    {
        // 유효성 체크
        $request->validate([
            'b_title' => ['required', 'between:1,50']
            ,'b_content' => ['required', 'between:1,200']
            ,'file' => ['required', 'image']
            ,'bc_type' => ['required', 'exists:boards_category']
        ]);

        $filePath = '';
        try{
            // 파일 저장
            $filePath = $request->file('file')->store('img');

            DB::beginTransaction();
            // 인서트 처리
            $insertData = $request->only('b_title', 'b_content', 'bc_type');
            $insertData['b_img'] = '/'.$filePath;
            $insertData['u_id'] = Auth::id();
            Board::create($insertData);
            DB::commit();
        } catch(Throwable $th) {
            DB::rollBack();
            if(Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
        }

        return redirect()->route('boards.index', ['bc_type' => $request->bc_type]);





        // 이전페이지로 넘어가면서 에러메세지까지 담아준다

        // $validator = Validator::make(
        //     $request->only('b_title', 'b_content', 'file')
        //     ,[
        //         'b_title' => ['required', 'between:1,50']
        //         ,'b_content' => ['required', 'between:1,200']
        //         ,'file' => ['required', 'image']
        //     ]
        // );

        // if($validator->fails()) {
        //     return redirect()->route('boards.create')->withErrors($validator);
        // }
        // 다른페이지로 가고싶거나할떄는 이거 써야된다
        
        // try {
        //     DB::beginTransaction();
        //     Board::create([
        //         'b_title' => $request->b_title
        //         ,'b_content' => $request->b_content
        //         ,'b_img' => $request->b_img
        //     ]);
        //     DB::commit();
        //     } catch(Throwable $th) {
        //         DB::rollBack();
        //         return redirect()->route('boards.index')->withErrors($th->getMessage());
        //     }
        //     return redirect()->route('boards.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 상세 페이지 표시
    public function show($id)
    {
        // Log::debug('***** borads.show.start *****');
        // Log::debug('id : '.$id);

        
        $result = Board::find($id);
        
        $responseData = $result->toArray();
        $responseData['delete_flg'] = $result->u_id === Auth::id();
        
        // Log::debug('획득 상세 데이터', $result->toArray());

        return response()->json($responseData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 수정 페이지로 이동
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 실제로 db에 수정처리
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 실제로 db에 데이터삭제 (소프트델리트)
    public function destroy($id)
    {
        $result = Board::destroy($id);

        $responseData = [
            'success' => $result === 1 ? true : false
        ];

        return response()->json($responseData);
    }


}
