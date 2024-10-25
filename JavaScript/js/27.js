// -----------------------
// 배열
// -----------------------
const ARR1 = [1, 2, 3, 4, 5];

// push()
// 배열에서 새로운 요소 추가, 리턴은 변경된 length
ARR1.push(10);

// length
// 배열의 길이 획득
console.log(ARR1.length);

// isArray()
// 배열인지 아닌지 체크
console.log(Array.isArray(ARR1)); // true
console.log(Array.isArray(1)); // false

