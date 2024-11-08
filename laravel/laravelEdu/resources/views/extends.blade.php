{{-- 상속 --}}
@extends('layout.layout')

{{-- @section : 부모템플릿에 해당하는 yield에 삽입 --}}
@section('main')
<main>
    <h2>자신의 메인 영역</h2>
</main>
@endsection

@section('show','자식자식 show')

{{-- if문 --}}

<hr>
@if($data[0]['gender'] === 'F')
    <span>여자</span>
@elseif($data[0]['gender'] === 'M')
    <span>남자</span>
@else
    <span>알수없음</span>
@endif

{{-- 반복문 --}}
{{-- @for ~ @endfor : for 반목문 --}}
@for($i = 0; $i < 5; $i++)
    <span>{{ $i }}</span>
@endfor

{{-- @for($a = 2; $a < 10; $a++)
    <h2>{{$a}}단</h2>
    @for($b = 2; $b < 10; $b++)
        <span>{{$a}} X {{$b}} = {{$a*$b}} <br></span>
    @endfor
@endfor --}}

{{-- @foreach ~ @endforeach : foreach 반복문 --}}
@foreach($data as $item)
    @if($loop->odd) 
        <div style="color: red">
            <span>{{ $item['name'] }}</span>
            <span>{{ $item['gender'] }}</span>
            {{-- <span>남은 루프 횟수 : {{ $loop->remaining }}</span> --}}
        </div>
    @else
        <span>{{ $item['name'] }}</span>
        <span>{{ $item['gender'] }}</span>
    @endif

@endforeach

{{-- @forelse ~ @empty ~ @endforelse 
    루프를 할 데이터가 길이 1이상이면 @forelse의 처리 
    배열의 길이가 0이면 @emtry의 처리를합니다.
--}}

@forelse($data as $item)
        <div>{{ $item['name'] }}</div>
@empty
        <span>데이터없음</span>
@endforelse