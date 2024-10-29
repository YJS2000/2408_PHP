// --------------
// Math 객체
// --------------
// 올림, 반올림, 버림
Math.ceil(0.1); // 1
Math.round(0.5); // 1
Math.floor(0.9); // 0

// 랜덤값
Math.random(); // 0 ~ 1사이의 랜덤한 값을 획득
Math.floor(Math.random()*10) + 1;  // 1~10 랜덤 숫자

// 최대값
Math.max(1, 2, 3, 4); // 4
let arr = [1, 2, 3, 4, 5];
Math.max(...arr); // 5

// 최소값
Math.min(3, 5, 2, 1, 0); // 0
Math.max(...arr); // 1

// 절대값
Math.abs(-1); // 1
Math.abs(1); // 1
