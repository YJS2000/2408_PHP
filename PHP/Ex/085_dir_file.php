<?php

// // -----------------
// // 디렉토리 생성
// // -----------------
// $mkdir_result = mkdir("./my_dir");
// if($mkdir_result) {
//     // 정상일경우 처리
// } else  {
//     // 실패일 경우 처리
// }

// // -------------
// // 디렉토리 존재 유무 체크
// // // ------------
// $chk_result = is_dir("./my_dir");
// if($chk_result) {
//     echo "있다";
// }else {
//     echo "없다";
// }

// // ---------------
// // 디랙토리 열기 및 읽기
// // ---------------
// $open_result = opendir("./my_dir"); // 디렉토리 열기

// while($file = readdir($open_result)) {
//     echo $file."\n";
// }

// ------------
// 디렉토리 닫기
// ------------
// closedir($open_result);

// ------------
// 디렉토리 삭제
// ------------
// rmdir("./my_dir");


// -----------------------------------------
// -----------------------------------------
// 파일열기
$file = fopen("./my_dir/text.txt","a");
if($file) {
    // 파일열기 성공시 처리
    fwrite($file, "떡볶이"); //파일에 쓰기
}else {
    // 파일열기 실패시 처리
    echo "파일 열기 실패";
}

// ---------------
// 파일닫기
// ---------------
fclose($file);

// ----------------
// 파일 삭제
// ----------------
unlink("./my_dir/text.txt");