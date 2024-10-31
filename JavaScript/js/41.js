// 타이머 함수
// ------------------------

// setTimeout(callback, ms) : 일정시간이 흐른 후에 콜백 함수를 실행
// setTimeout(() => {
//     console.log('시간초과');
// }, 5000 );

// // C > B > A 순으로 출력, 총 3초 소요
// setTimeout(() => console.log('A'), 3000);
// setTimeout(() => console.log('B'), 2000);
// setTimeout(() => console.log('C'), 1000);


// // callback hell 콜백지옥
// // A > B > C 순으로 출력, 총 6초 소요
// setTimeout(() => {
//     console.log('A');
//     setTimeout(() => {
//         console.log('B');
//         setTimeout(() => {
//             console.log('C')
//         }, 1000);
//     }, 2000);
// }, 3000);

// clearTimeout(타이머ID) : 해당 타이머 ID의 처리를 제거
const TIMER_ID = setTimeout(() => console.log('타이머'), 10000);
console.log(TIMER_ID);
clearTimeout(TIMER_ID);

// setInterval(callback, ms) : 일정 시간 마다 콜백함수를 실행
const INTERVAL_ID = setInterval(() => {
    console.log('인터벌');
}, 1000);

// clearInterval(ID) : 해당 id의 인터벌을 제거
clearInterval(INTERVAL_ID);


// 두둥등장
(() => {
    const NEW = document.createElement('h1');
    NEW.textContent = '두둥등장';
    NEW.classList.add('blue');
    NEW.style.fontSize = '5rem';

    document.body.appendChild(NEW);
})();


setInterval(() => {
    const NEW = document.querySelector('h1');
    NEW.classList.toggle('red');
    NEW.classList.toggle('blue');
}, 1000)
