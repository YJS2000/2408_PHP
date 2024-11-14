@extends('layout.layout')

@section('title', '회원가입 페이지')

@section('bodyClassVh', 'vh-100')

@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
    <form style="width: 300px;" action="{{ route('registLogin') }}" method="post">
        @csrf
        <div id="errorMsg" class="form-text text-danger">
            <div id="errorMsg" class="form-text text-danger">
                @foreach($errors->all() as $errorMsg)
                <span>{{ $errorMsg }}</span>
                <br>
                @endforeach
            </div>
        </div>
        <div class="mb-3">
            <label for="u_email" class="form-label">아이디</label>
            <input type="email" class="form-control" id="u_email" name="u_email">
        </div>
        <div class="mb-3">
            <label for="u_password" class="form-label">비밀번호</label>
            <input type="password" class="form-control" id="u_password" name="u_password">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">이름</label>
            <input type="name" class="form-control" id="name" name="name">
        </div>
            <button type="submit" class="btn btn-dark w-100 mb-3">가입 완료</button>
            <a href="{{ route('goLogin') }}" class="btn btn-secondary w-100">취소</a>
    </form>
</main>
@endsection