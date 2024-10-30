function inlineEventBtn() {
    alert('무한루프');
}

function btnColor() {
    const H1 = document.querySelector('h1')
    H1.classList.add('title-click')
}

const BTN_LISTENER = document.querySelector('#btn1');
BTN_LISTENER.addEventListener('click',callAlert);

function callAlert() {
    alert('이벤트 리스너 실행');
};

const BTN_TOGGLE = document.querySelector('#btn_toggle')
BTN_TOGGLE.addEventListener('click',() => {
    const TITLE = document.querySelector('h1');
    TITLE.classList.toggle('title-click');
});

// removeEventListener ()
BTN_LISTENER.removeEventListener('click', callAlert);

const H2 = document.querySelector('h2')
H2.addEventListener('click', testyong);

function testyong() {
    alert('테스트용');
    // H2.removeEventListener('click', testyong)
}

const TITLE = document.querySelector('h1');
TITLE.addEventListener('mouseenter',() => {
    H2.removeEventListener('click', testyong);
    console.log('tt');
}, {once: true}); // option : once가 true일 경우 한번만 실행

// 이벤트 객체
const H3 = document.querySelector('h3');
H3.addEventListener('mouseup', (e) => {
    e.target.style.color = 'red';
});

// 모달
const BTN_MODAL = document.querySelector('#btn-modal');
BTN_MODAL.addEventListener('click', () => {
    const MODAL = document.querySelector('.modal-container');
    MODAL.classList.remove('display-none');
});

// 모달닫기
const MODAL_CLOSE = document.querySelector('#modal-close');
MODAL_CLOSE.addEventListener('click', () => {
    const MODAL = document.querySelector('.modal-container');
    MODAL.classList.add('display-none');
});

// 팝업
const NAVER = document.querySelector('#naver')
NAVER.addEventListener('click', () =>{
    open('https://www.naver.com', '_self', 'width=500 height=500');
});