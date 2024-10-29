// ----------
// String 객체
// ----------
let str = '문자열입니다.문자열입니다.';
let str2 = new String('문자열입니다');

// length : 문자열의 길이를 반환
console.log(str.length); // 6

// charAt(index) : 해당 인덱스의 문자를 반환
console.log(str.charAt(2)); // 열

// indexOf() : 문자열에서 해당 문자열을 찾아 최초의 인덱스를 반환
// 해당 문자열이 없으면 -1 리턴
console.log(str.indexOf('자열')); // 1
console.log(str.indexOf('자열', 5)); // 1

// includes() : 문자열에서 해당 문자열의 존재여부 체크
console.log(str.includes('문자')); // true
console.log(str.includes('php')); // false

// replace() : 특정 문자열을 찾아서 지정한 문자열로 치환한 문자열을 반환
str = '문자열입니다.문자열입니다.';
console.log(str.replace('문자열', 'PHP')); // PHP입니다.문자열입니다.

// replaceAll() : 특정 문자열을 찾아서 모두 지정한 문자열로 치환한 문자열을 반환
console.log(str.replaceAll('문자열', 'PHP')); // PHP입니다.PHP입니다.

// substring(start, end) : 시작 인덱스부터 종료 인덱스까지 자른 문자열을 반환Z
// endIndex는 생략시 startIndex부터 끝까지의 문자열 반환
// ** 주의 : 비슷한 기능으로 String.substr()이 있으나 비표준이므로 사용을 지양할 것 **
str = '문자열입니다.문자열입니다.';
console.log(str.substring(1, 3)); // 자열

str = 'bearer: 34asdasdwqafszadfweg';
console.log(str.substring(8)); // 34asdasdwqafszadfweg

// split(separator, limit) : 문자열을 separator 기준으로 잘라서 배열을 만들어 반환
str = '짜장면,탕수육,라조기,짬뽕,볶음밥';
let arrSplit = str.split(',');
console.log(arrSplit); // ['짜장면', '탕수육', '라조기', '짬뽕', '볶음밥']

// trim() : 좌우 공백 제거해서 반환
str = '      아아아 배고프다       '
console.log(str.trim()); // '아아아 배고프다'

// toUpperCase(), toLowerCase() : 알파뱃을 대/소문자로 변환해서 반환
str = 'aBcDeFg';
console.log(str.toUpperCase()); // ABCDEFG
console.log(str.toLowerCase()); // abcdefg


