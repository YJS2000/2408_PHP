<?php
// // ---------------
// // PDO Class : DB 액세스 방법중 하나

// // DB 접속 정보
// $my_host = "localhost"; // DB Host
// $my_user = "root"; // DB 계정명
// $my_password = "php504"; //DB 계정 비밀번호
// $my_db_name = "dbsample"; //접속할 DB명
// $my_charset = "utf8mb4"; //DB charset

// $my_dsn = "mysql:host=".$my_host.";dbname=".$my_db_name.";charset=".$my_charset; // DSN

// //PDO 옵션 설정
// $my_otp = [
//     // prepared Statement로 쿼리로 준비할 때, PHP와 DB 어디에서 에뮬레이션 할지 여부를 결정
//     PDO::ATTR_EMULATE_PREPARES      => false // DB에서 에뮬레이션 하도록 설정
//     // PDO에서 예외를 처리하는 방식을 지정
//     ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
//     // DB의 결과를 fetch하는 방식을 지정
//     ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC // 연관배열로 fetch
// ];

// // DB 접속
// $conn = new PDO($my_dsn, $my_user, $my_password, $my_otp);

// // select
// $sql = "SELECT 
//             *
//         FROM employees
//         ORDER BY emp_id ASC
//         limit 5";
// $stmt = $conn->query($sql); // PDO::query() : 쿼리 준비 + 실행
// $result = $stmt->fetchAll(); // 질의 결과를 패치
// print_r($result);

// // 사번과 이름만 출력
// foreach($result as $item){
//     echo $item["emp_id"]." ".$item["name"]."\n";
// }

// DB 정보

$my_host = "localhost"; //host
$my_port = "3306"; //port
$my_user = "root"; //user
$my_password = "php504"; //password
$my_db_name = "dbsample"; // DB_name
$my_charset = "utf8mb4"; //charset

// DSN
$my_dsn = "mysql:host=".$my_host.";port=".$my_port.";dbname=".$my_db_name.";charset=".$my_charset;

// PDO Option
$my_option = [
    // prepared Statment의 애물레이션 설정
    PDO::ATTR_EMULATE_PREPARES      => false
    // 예외 발생시, 예외 처리 방법 설정
    ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
    // fatch 할때 데이터 타입 설정
    ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
];

// PDO Class 인스턴스
$conn = new PDO($my_dsn, $my_user, $my_password, $my_option);

// // select
// $sql = " SELECT "
//         ."      * "
//         ." FROM "
//         ."      employees "
//         ." limit 3 "
//         ;
// $stmt = $conn->query($sql); // 쿼리 실행 및 결과 반환
// $result = $stmt->fetchAll(); // 결과 Fetch

// print_r($result);
 
// select 예재
$sql = " SELECT "
        ." * "
        ." FROM "
        ." EMPLOYEES"
        ." WHERE "
        ." emp_id = :emp_id1 "
        ." OR emp_id = :emp_id2 ";
$prepare = [
    "emp_id1" => 10001
    ,"emp_id2" => 10002
];

$stmt = $conn->prepare($sql); //쿼리준비
$stmt -> execute($prepare); //쿼리실행
$result = $stmt->fetchAll();

print_r($result);









