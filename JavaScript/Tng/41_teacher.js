function leftPadZero(target, length) {
    return String(target).padStart(length, '0');
}

function getDate() {
    const NOW = new Date();
    let hour = NOW.getHours(); // 시간 획득
    let minute = NOW.getMinutes(); // 분 획득
    let second = NOW.getSeconds(); // 초 획득
    let ampm = hour < 12 ? '오전' : '오후' // 오전, 오후
    let hour12 = hour < 13 ? hour : hour - 12; // 시간 (12시 포맷)

    let timeFomat = 
        `${ampm} ${leftPadZero(hour12,2)}:${leftPadZero(minute,2)}:${leftPadZero(second,2)}`

    document.querySelector('#time').textContent = timeFomat;
}



(() => {
    getDate();
    let intervalID = null;
    intervalID = setInterval(getDate, 500);

    // 멈춰 버튼
    document.querySelector('#btn-stop').addEventListener('click', () => {
        clearInterval(intervalID);
        intervalID = null;
    })

    // 재시작 버튼
    document.querySelector('#btn-restart').addEventListener('click', () => {
        if(intervalID === null) {
            intervalID = setInterval(getDate, 500);
        }
    });
})();