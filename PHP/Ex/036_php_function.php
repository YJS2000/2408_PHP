<?php
// PHP 내장함수

// --------------
// trim(문자열) : 문자열의 좌우 공백을 제거해서 반환
$str = "   미어캣    ";
echo trim($str);

// --------------
// strtoupper(문자열), strtolower(문자열) : 문자열을 대/소문자로 변환해서 변환
$str2 = "AbcDe";
echo strtoupper($str2);
echo strtolower($str2);
echo "\n";

// --------------
// mb_stlen(문자열) : 문자열의 길이를 반환, 멀티바이트 문자열에 대응
$str3 = "미어캣";
echo strlen($str3);
echo mb_strlen($str3);
echo "\n";


// ----------------
// str_replace(문자열) : 특정 문자를 치환해서 반환
$str4 = "key : 34sdfsdfsdfsdf";
echo str_replace("key : ", "", $str4); 

echo "\n";
// -----------
// mb_substr(대상문자열, 자를개수, 출력할 개수) : 문자열을 잘라서 반환
$str5 = "php입니다.";
echo mb_substr($str5, 3, 1)."\n"; // 좌측 부터 잘린다.
echo mb_substr($str5, -3, 1); // 우측 부터 잘린다.
echo "\n";

// ------------
// mb_strpos(대상문자열, 검색할 문자열) : 검색할 문자열의 특정 위치를 반환
$str6 = "점심 뭐먹지?";
echo mb_strpos($str6, "뭐")."\n"; // 시작이 0임
// "뭐"부터 3글자를 잘라오기
echo mb_substr($str6, mb_strpos($str6, "뭐"), 3)."\n";

// ------------
// sprintf(포맷문자열, 대입문자열1, 대입문자열2...) : 포맷 문자열에 대입문자열들을 순서대로 대입해서 반환
$str_format = "당신의 점수는 %d점 입니다. <%s>";

echo sprintf($str_format, 90, "A");

// ---------------
//  isset(변수) : 변수가 설정되어 있는지 확인하여 true/false 반환
$str7 = "";
$str8 = null;
var_dump(isset($str7));
var_dump(isset($str8));
var_dump(isset($NO));

ECHO "\n";

// empty(변수) : 변수의 값이 비어있는지 확인해서 true/false 볍환
$empty1 = "abc";
$empty2 = "";
$empty3 = 0;
$empty4 = [];
$empty5 = NULL;
var_dump(empty($empty1));
var_dump(empty($empty2));
var_dump(empty($empty3));
var_dump(empty($empty4));
var_dump(empty($empty5));
echo "\n";
// ---------------
// is_null(변수) : 변수가 null인지 아닌지 확인하여 true/false를 반환
$chk_null = null;
var_dump(is_null($chk_null));

// ---------------
// gettpye(변수) : 변수의 데이터 타입을 문자열로 반환
$type1 = "abc";
$type2 = 0;
$type3 = 1.2;
$type4 = [];
$type5 = true;
$type6 = null;
$type7 = new datetime();
echo gettype($type1)."\n";
echo gettype($type2)."\n";
echo gettype($type3)."\n";
echo gettype($type4)."\n";
echo gettype($type5)."\n";
echo gettype($type6)."\n";
echo gettype($type7)."\n";

// -----------
// settype(변수, 테이터타입) : 변수의 데이터 타입을 변환
$type8 = "1";
// var_dump((int)$type8); 원본은 변경하지않고, 일시적으로 캐스팅
settype($type8, "int"); // 원본의 데이터 타입을 변환
var_dump($type8);

// ----------------
// time() : 현재시간을 반환(타임스탬프 초단위)
echo time();
echo "\n";

// ---------------
// date(시간포맷, 타임스탬프값) : 시간 포맷 형식으로 문자열을 반환 
echo date("Y-m-d H:i:s", time());
echo "\n";

// --------------
// ceil(변수), round(변수), floor(변수) : 각 올림 반올림 버림 하여반환
echo ceil(1.2)."\n";
echo round(1.5)."\n";
echo floor(1.9)."\n";

// random_int(시작값, 끝값) : 시작값 부터 끝값까지의 랜덤한 숫자를 반환
echo random_int(1,10);