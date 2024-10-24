// --------------------
// 함수 선언식
// 호이스팅에 영향받는다
// 재할당 가능하므로 함수명 중복 안되게 조심해야함
// --------------------
console.log(mySum(4, 5));

function mySum(a, b) {
    return a + b;
}

// ------------------
// 함수 표현식
// 호이스팅에 영향을 받지 않는다.
// 재할당을 방지
// ------------------
const myPlus = function(a, b) { // 익명함수를 myPlus란 상수에 저장
    return a + b;
} 

// -----------------
// 화살표 함수 줄여서 쓰는거
// 위쪽이 화살표함수로 줄인것
// -----------------
// 파라미터가 2개 이상일 경우 (소괄호 생략 불가)
const arrowFnc = (a, b) => a + b;

function test1(a, b) {
    return a + b;
}

// 파라미터가 1개일 경우 (소괄호 생략 가능)
const arrowFnc2 = a => a;

function test2(a) {
    return a;
}

// 파라미터가 없는 경우 (소괄호 생략 불가)
const arrowFnc3 = () => 'test';

function test3() {
    return test
}

// 처리가 여러줄일 경우
const arrowFmc4 = (a, b) => {
    if(a<b) {
        return 'b가더큼';
    } else {
        return 'a가 더큼';
    }
}

function test4(a, b) {
    if(a<b) {
        return 'b가더큼';
    } else {
        return 'a가 더큼';
    }
}

