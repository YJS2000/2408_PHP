// if문
let num = 1;

if(num === 1) {
    console.log('1등');
} else if(num === 2) {
    console.log('2등');
} else if(num ===3) {
    console.log('3등');
} else {
    console.log('등수외');
}

// switch 문
switch(num) {
    case 1:
        console.log('1등');
        break;
    case 2:
        console.log('2등');
        break;
    default:
        console.log('순위외');
        break;
} 

// for 문
// 구구단 2단 ~ 9단
let i = 0;
let q = 0;
for( q=2 ; q < 10 ; q++ ){
    console.log('**'+q+'단**')
    for( i=2 ; i < 10 ; i++ ) {
        console.log(q+' x '+i+' = '+q * i);
    }
}

let y = 0;
let t = 0;
for( y = 1 ; y < 6 ; y++){
    for(t = 1 ; t <= y ; t++){
        console.log('*');
    }
    console.log('');
}

// for...in : 모든 객체를 반복하는 문법, key접근
const OBJ2 = {
    key1: 'val1'
    ,key2: 'val2'
}

for(let key in OBJ2) {
    console.log(OBJ2[key]);
}

//for...of : 이터러블(iterable) 객체를 반복하는 문법
const STR1 = '안녕하세요';

for(let val of STR1) {
    console.log(val);
}

const ARR1 = [1,2,3];