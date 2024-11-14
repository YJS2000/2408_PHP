<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Throwable;

class UserController extends Controller
{
    /**
     * 로그인 페이지로 이동
     */
    public function goLogin() {
        return view('login');
    }

    /**
     * 로그인처리
     */
    public function login(Request $request) {
        // 유효성 체크
        $validator = Validator::make(
            $request->only('u_email', 'u_password')
            ,[
                'u_email' => ['required', 'email', 'exists:users,u_email'] // 회원 정보 체크
                ,'u_password' => ['required', 'between:6,20', 'regex:/^[a-zA-Z0-9!@]+$/']
            ]
        );

        if($validator->fails()) {
            return redirect()
            ->route('goLogin')
            ->withErrors($validator->errors());
        }

        // 회원 정보 획득
        $userInfo = User::where('u_email', '=', $request->u_email)->first();

        // 비밀번호 체크
        if(!(Hash::check($request->u_password, $userInfo->u_password))) {
            return redirect()->route('goLogin')->withErrors('비밀전호가 일치하지 않습니다.');
        }

        // 유저 인증 처리
        Auth::login($userInfo);

        // var_dump(Auth::id()); // 로그인한 유저의 pk 획득
        // var_dump(Auth::user()); // 로그인한 유저의 정보 획득
        // var_dump(Auth::check()); // 로그인 여부 체크
        return redirect()->route('boards.index');


    }

    /**
     * 로그아웃 처리
     */
    public function logout() {
        Auth::logout(); // 로그아웃 처리

        Session::invalidate(); // 기존 세션의 모든 데이터 제거 및 새로운 세션 ID 발급
        Session::regenerate();
        return redirect()->route('goLogin');

    }

    // 회원가입 페이지로 이동
    public function regist() {
        return view('regist');
    }

    // 회원가입후 정보 넘겨주기
    public function registLogin(Request $request) {
        $validator = Validator::make(
        $request->only('u_email', 'u_password', 'name')
        ,[
            'u_email' => ['required', 'email', 'unique:users,u_email']
            ,'u_password' => ['required', 'between:6,20', 'regex:/^[a-zA-Z0-9!@]+$/']
            ,'name' => ['required', 'between:1,20', 'regex:/^[가-힣]+$/']
        ]
        );

        if($validator->fails()) {
            return redirect()
            ->route('regist')
            ->withErrors($validator->errors());
        }

        $hashedPassword = Hash::make($request->u_password);

        // 회원정보 삽입

        $userInsert = new User();
        $userInsert->u_email = $request->u_email;
        $userInsert->u_password = $hashedPassword;
        $userInsert->name = $request->name;
        $userInsert->save();

        return redirect()->route('goLogin');

        // try {
        //     DB::beginTransaction();
        //     User::create([
        //         'u_email' => $request->u_email
        //         ,'u_password' => Hash::make($request->u_password)
        //         ,'name' => $request->name
        //     ]);
        //     DB::commit();
        //     } catch(Throwable $th) {
        //         DB::rollBack();
        //     }
        //     return redirect()->route('goLogin');
    }
}
