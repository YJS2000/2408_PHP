<?php

// 나의 급여를 2500만원으로 변경해주세요.

require("../Ex/my_db.php");

$conn = null;

try{

    $conn = my_db_conn(); // PDO 획득

    // transaction 시작
    $conn->beginTransaction(); //트랜잭션 시작

    $sql =
        " UPDATE salaries "
        ." set "
        ." end_at = date(now()) "
        ." ,updated_at = now() "
        ." where "
        ." emp_id = :emp_id "
        ." AND end_at is null "
    ;

    $arr_prepare = [
        "emp_id" => 100020
    ];
    
    $stmt = $conn->prepare($sql); // 쿼리준비
    $result_flg = $stmt->execute($arr_prepare); //쿼리실행

    // 쿼리 실행 예외 처리
    if(!$result_flg) {
        throw new Exception("update exec Error : salaries");
    }

    // 영향받은 레코드 수 예외 처리
    if($stmt->rowCount() !== 1) {
        throw new Exception("update Row count Error : salaries");
    }

    // 새로운 급여이력 추가
    // 급여테이블 insert
    $sql = 
    "INSERT INTO salaries( "
    ." emp_id "
    ." ,salary "
    ." ,start_at "
    ." ) "
    ." values( "
    ." :emp_id "
    ." ,:salary "
    ." ,date(now())"
    ." ) "
    ;
    $arr_prepare = [
        "emp_id" => 100020
        ,"salary" => 25000000
    ];

    $stmt = $conn->prepare($sql); // 쿼리 준비
    $result_flg = $stmt->execute($arr_prepare); // 쿼리실행

    // 쿼리 실행 예외 처리
    if(!$result_flg) {
        throw new Exception("insert exec Error : salaries");
    }

    // 영향받은 레코드 수 예외 처리
    if($stmt->rowCount() !== 1) {
        throw new Exception("Insert Row count Error : salaries");
    }

    // commit
    $conn->commit();
} catch(Throwable $th) {
    if(!is_null($conn)) {
        $conn->rollBack();
    }
    echo $th->getMessage();
}