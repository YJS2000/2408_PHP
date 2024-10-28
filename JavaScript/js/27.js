// -----------------------
// 배열
// -----------------------
const ARR1 = [1, 2, 3, 4, 5];

// push()
// 원본배열에 마지막 요소 추가, 리턴은 변경된 length
ARR1.push(10);

// length
// 배열의 길이 획득
console.log(ARR1.length);

// isArray()
// 배열인지 아닌지 체크
console.log(Array.isArray(ARR1)); // true
console.log(Array.isArray(1)); // false

// indexOf()
// 배열에서 특정 요소를 검색하고, 해당 인덱스를 반환
// 해당 요소가 없으면 -1 반환
let i = ARR1.indexOf(4);
console.log(i);

// includes()
// 배열의 특정 요소의 존재여부를 체크, boolean 리턴
let arr1 = ['홍길동', '갑순이', '갑돌이']
let boo = arr1.includes('갑순이');
console.log(boo);

// push()
// 원본배열에 마지막 요소 추가, 리턴은 변경된 length
ARR1.push(10);
ARR1.push(20, 30, 50);
// 성능이슈 발생시 lenth를 이용해서 직접 요소를 추가할 것
ARR1[ARR1.length] = 100;

// 배열복사
// 객체는 기본적으로 앏은복사가 되므로 딥카피를 하기위해서는 Spread odperatro 를 이용
// 얇은 복사
const  COPY_ARR1 = ARR1;
COPY_ARR1.push(9999);
// 깊은 복사 : 얘를더 많이씀 원본손상 없이 복사가능
const COPY_ARR2 = [...ARR1]
COPY_ARR2.push(8888);

// pop()
// 원본 배열의 마지막 요소를 제거, 제거된 요소를 반환
// 제거할 요소가 없으면 undefined 반환
const ARR_POP = [1, 2, 3, 4, 5];
let result_pop = ARR_POP.pop();
console.log(result_pop);

// unshift()
// 원본 배열의 첫번째 요소를 추가, 변경된 length 반환, 원본변경됨
const ARR_UNSHIFT = [1, 2, 3];
let resultUnshift = ARR_UNSHIFT.unshift(100);
console.log(resultUnshift);

// shift()
// 원본 배열의 첫뻔재 요소를 제거, 제거된 요소를 반환, 원본변경됨
// 제거할 요소가 없으면 undefined 반환
const ARR_SHIFT = [1, 2, 3, 4];
let resultShift = ARR_SHIFT.shift();
console.log(resultShift);

// splice()
// 요소를 잘라서 자를 배열을 반환, 원본이변경됨
let arrSplice = [1, 2, 3, 4, 5];
let resultSplice = arrSplice.splice(2);
console.log(resultSplice);
console.log(arrSplice);
// 시작을 음수로 한경우
arrSplice = [1, 2, 3, 4, 5];
resultSplice = arrSplice.splice(-2);
console.log(resultSplice);
console.log(arrSplice);
// start, count 를 모두 셋팅할 경우
arrSplice = [1, 2, 3, 4, 5];
resultSplice = arrSplice.splice(1, 2);
console.log(resultSplice);
console.log(arrSplice);
//배열의 특정위치에 새로운 요소를 추가
arrSplice = [1, 2, 3, 4, 5];
resultSplice = arrSplice.splice(2, 0, 999);
console.log(resultSplice);
console.log(arrSplice);
// 배열에서 특정 요소를 새로운 요소로 변경
arrSplice = [1, 2, 3, 4, 5];
resultSplice = arrSplice.splice(2, 1, 999);
console.log(resultSplice);
console.log(arrSplice);

// join()
// 배열의 요소들을 특정 구분자로 연결한 문자열을 반환
let arrJoin = [1, 2, 3, 4];
let resultJoin = arrJoin.join(', ');
console.log(resultJoin);
console.log(arrJoin);

// sort()
// 배역의 요소를 오름차순 정렬
// 파라미터를 전달하지 않을 경우에, 문자열로 변환 후에 정렬
let arrSort = [5, 6, 7, 3, 2, 20];
// let resultSort = arrSort.sort(); // 문자열로 받아와버림
// console.log(resultSort); // [2, 20, 3, 5, 6 ,7 ]
// console.log(arrSort); // [2, 20, 3, 5, 6 ,7 ]
let resultSort = arrSort.sort((a, b) => a- b);
console.log(resultSort); // [2, 3, 5, 6, 7, 20]
console.log(arrSort); // [2, 3, 5, 6, 7, 20]

// map()
// 배열의 모든 요소에 대해서 콜백 함수를 반속 실행한 후, 그 결과를 새로운 배열로 반환
let arrMap = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
let resultMap = arrMap.map(num => {
    if(num % 3 === 0) {
        return '짝';
    }
    else {
        return num;
    }
});
console.log(resultMap);
console.log(arrMap);

const TEST = {
    entity: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
    ,length: 10
    ,map: function (callback) {
        let resultArr = [];
        
        for(let i = 0; i < this.entity.length; i++) {
            resultArr[resultArr.length] = callback(this.entity[i]);
        }
        return resultArr;
    }
}

let resultTest = TEST.map(testCallback);

function testCallback(num) { 
    if(num % 3 === 0) {
    return '짝';
    }
    else {
        return num;
    }
}

// filter() 
// 배열의 모든요소에 대해 콜백 함수를 반복 실행하고, 조건에 만족한 요소만 배열로 반환
let arrFilter = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
let resultFilter = arrFilter.filter(num => num % 3 === 0);
console.log(resultFilter); // [3, 6, 9]

// some()
// 배열의 모든 요소에 대해 콜백 함수를 반복 실행하고, 
// 조건에 만족하는 결과가 하나라도 있으면 true
// 만족하는 결과가 하나도 없으면 false를 리턴
let arrSome = [1, 2, 3, 4, 5];
let resultSome = arrSome.some(num => num ===5)
console.log(resultSome); // true

// every()
// 배열의 모든 요소에 대해 콜백 함수를 반복 실행하고
// 조건에 모든 결과가 만족하면 true
// 하나라도 만족하지 않으면 false
let arrEvery = [1, 2, 3, 4, 5];
let resultEvery = arrEvery.every(num => num === 5);
console.log(resultEvery); // false

// foreach()
// 배열의 모든 요소에 대해 콜백함수를 반복 실행
let arrForeach = [1, 2, 3, 4, 5];
arrForeach.forEach((val, idx) => {
    // console.log(idx + ' : ' +val);
    console.log(`${idx} : ${val}`); 
})

// 0 : 1
// 1 : 2
// 2 : 3
// 3 : 4
// 4 : 5