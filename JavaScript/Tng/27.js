// 원본은 보존하면서 오름차순 정렬 해주세요
const ARR1 = [6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40]
const COPY_ARR = [...ARR1]

let resultSort = COPY_ARR.sort((a, b) => a - b) 
console.log(ARR1)
console.log(resultSort);

resultSort.forEach((val, idx) => {
    console.log(val)
})


// 짝수와 홀수를 분리해서 각각 새로운 배열 만들어주세요
const ARR2 = [5, 7, 3, 4, 5, 1, 2]
let resultFilter1 = ARR2.filter(num => num % 2 === 0);
console.log(resultFilter1);

let resultFilter2 = ARR2.filter(num => num % 2 === 1);
console.log(resultFilter2);

