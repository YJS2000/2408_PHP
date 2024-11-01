let intervalId = null;

function updateTime() {
    const NOW = new Date();

    const addLpadZero = (num, length) => {
        return String(num).padStart(length, "0");
    }

    const HOUR = addLpadZero(NOW.getHours(), 2);
    const MINUTES = addLpadZero(NOW.getMinutes(), 2);
    const SECOND = addLpadZero(NOW.getSeconds(), 2);

    let HOUR_FIX;
    let FOMAT_DATE;

    if (HOUR > 12) {
        HOUR_FIX = addLpadZero(HOUR - 12, 2);
        FOMAT_DATE = '오후 ' + HOUR_FIX + ':' + MINUTES + ':' + SECOND;
    } else if (HOUR === '00') {
        HOUR_FIX = '00';
        FOMAT_DATE = '오전 ' + HOUR_FIX + ':' + MINUTES + ':' + SECOND;
    } else if (HOUR === '12') {
        HOUR_FIX = HOUR
        FOMAT_DATE = '오후 ' + HOUR_FIX + ':' + MINUTES + ':' + SECOND;
    } else {
        HOUR_FIX = HOUR;
        FOMAT_DATE = '오전 ' + HOUR_FIX + ':' + MINUTES + ':' + SECOND;
    }

    const H1 = document.querySelector('h1');
    H1.innerHTML = '현재 시간 ' + FOMAT_DATE;
}

updateTime(); // 바로 시간 나오게
intervalId = setInterval(updateTime, 1000); // 함수 1초마다 인터벌시키는거임

const STOP = document.querySelector('.stop');
STOP.addEventListener('click', () => {
    clearInterval(intervalId);
    intervalId = null;
});

const START = document.querySelector('.start');
START.addEventListener('click', () => {
    if(intervalId === null) {
        intervalId = setInterval(updateTime,1000);
    }
});     

