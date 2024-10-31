// const BTN = document.querySelector('.btn')
// BTN.addEventListener('click', () => {
//     alert('안녕하세요'+'\n'+'숨어있는div를 찾아주세요');
// });

// function heartbeat() {
//     alert('두근두근');
// }

// const DIV_IN = document.querySelector('.div-in')
// DIV_IN.addEventListener('mouseenter', heartbeat);

// hide = true;

// DIV_IN.addEventListener('click', () => {
//     if(hide === true) {
//         alert('들켰다');
//         DIV_IN.removeEventListener('mouseenter', heartbeat);
//         hide = false;
//     } else {
//         alert('숨는다');
//         DIV_IN.addEventListener('mouseenter', heartbeat);
//         hide = true;
//         // 랜덤한 위치로 DIV_IN 이동
//         const randomX = Math.floor(Math.random() * (window.innerWidth - DIV_IN.offsetWidth));
//         const randomY = Math.floor(Math.random() * (window.innerHeight - DIV_IN.offsetHeight));
        
//         DIV_IN.style.position = 'absolute'; // 위치를 절대적으로 설정
//         DIV_IN.style.left = `${randomX}px`;
//         DIV_IN.style.top = `${randomY}px`;
//     }
//     DIV_IN.classList.toggle('toggle');
// });


// 1.`버튼` 클릭시 아래 문구 알러트로 출력
// 안녕하세요.
// 숨어있는 div를 찾아주세요.
(() => {
    // 초기에 세팅해야 할것들
    const BTN_INFO = document.querySelector('#btn-info')
    BTN_INFO.addEventListener('click', () => {
        alert('안녕하세요.\n숨어있는 div를 찾아주세요.');
    });

    // 2. 숨어있는 div에 마우스가 진입하면 아래 문구 알러트 출력
    // - 두근두근
    const CONTAINER = document.querySelector('.container');
    CONTAINER.addEventListener('mouseenter', dokidoki);

    // 3. 숨어있는 div를 마우스로 클릭하면 아래 문구 알러트 출력 및 나타나기
    // - 들켰다
    const BOX = document.querySelector('.box');
    BOX.addEventListener('click', busted)
})();


// 두근두근 함수
function dokidoki() {
    alert('두근두근');
}


// 들켯다 함수
function busted() {
    alert('들켯다');
    const CONTAINER = document.querySelector('.container')
    const BOX = document.querySelector('.box');

    BOX.removeEventListener('click', busted) // 기본 들켰다 이벤트 제거
    // 5. 나타난 div를 다시 클릭하면 아래 문구 알러트 출력 및 사라지기 
    // -숨는다-
    BOX.addEventListener('click', hide); // 숨는다 이벤트
    BOX.classList.add('busted'); // 배경색부여
    

    // 4. 들킨 div에는 마우스가 진입해도 두근두근이 뜨지 않습니다.
    CONTAINER.removeEventListener('mouseenter', dokidoki); // 기존 두근두근 이벤트 제거
}

// 숨는다 함수
function hide() {
    alert('숨는다');
    const CONTAINER = document.querySelector('.container')
    const BOX = document.querySelector('.box');

    BOX.classList.remove('busted'); // 들켰다 배경색 제거
    BOX.addEventListener('click', busted); // 들켰다 이벤트 추가
    BOX.removeEventListener('click', hide); // 기존 숨는다 이벤트 제거
    // 6. 다시 숨은 div에 마우스가 진입하면 아래 문구 알러트 출력
    // -두근두근-
    CONTAINER.addEventListener('mouseenter', dokidoki); // 두근두근 이벤트 추가
    // -- 보너스 문제 --
    // 다시 숨을 때 랜덤한 위치로 이동
    const RANDOM_X = Math.round(Math.random() * (window.innerWidth - CONTAINER.offsetWidth));
    const RANDOM_Y = Math.round(Math.random() * (window.innerHeight - CONTAINER.offsetHeight));
    CONTAINER.style.top = RANDOM_Y +'px';
    CONTAINER.style.left = RANDOM_X +'px';
}