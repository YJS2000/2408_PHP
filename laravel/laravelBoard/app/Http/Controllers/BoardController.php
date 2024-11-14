<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 리스트 페이지 표시
    public function index()
    {
        $result = Board::select('b_id', 'b_title', 'b_content', 'b_img')
                    ->orderBy('created_at', 'DESC')
                    ->orderBy('b_id', 'DESC')
                    ->get();

        return view('boardList')->with('data', $result);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    // 작성 페이지로 이동
    public function create()
    {
        return view('insert');
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
        try {
            DB::beginTransaction();
            Board::create([
                'b_title' => $request->b_title
                ,'b_content' => $request->b_content
                ,'b_img' => $request->b_img
            ]);
            DB::commit();
            } catch(Throwable $th) {
                DB::rollBack();
                return redirect()->route('boards.index')->withErrors($th->getMessage());
            }
            return redirect()->route('boards.index');
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
        Log::debug('***** borads.show.start *****');
        Log::debug('id : '.$id);

        $result = Board::find($id);

        Log::debug('획득 상세 데이터', $result->toArray());

        return response()->json($result->toArray());
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
        //
    }
}
