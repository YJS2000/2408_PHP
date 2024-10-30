const BTN = document.querySelector('.btn')
BTN.addEventListener('click', () => {
    alert('안녕하세요'+'\n'+'숨어있는div를 찾아주세요');
});

function heartbeat() {
    alert('두근두근');
}

const DIV_IN = document.querySelector('.div-in')
DIV_IN.addEventListener('mouseenter', heartbeat);

hide = true;

DIV_IN.addEventListener('click', () => {
    if(hide === true) {
        alert('들켰다');
        DIV_IN.removeEventListener('mouseenter', heartbeat);
        hide = false;
    } else {
        alert('숨는다');
        DIV_IN.addEventListener('mouseenter', heartbeat);
        hide = true;
        // 랜덤한 위치로 DIV_IN 이동
        const randomX = Math.floor(Math.random() * (window.innerWidth - DIV_IN.offsetWidth));
        const randomY = Math.floor(Math.random() * (window.innerHeight - DIV_IN.offsetHeight));
        
        DIV_IN.style.position = 'absolute'; // 위치를 절대적으로 설정
        DIV_IN.style.left = `${randomX}px`;
        DIV_IN.style.top = `${randomY}px`;
    }
    DIV_IN.classList.toggle('toggle');
});
