<?php

// 나의 급여를 2500만원으로 변경해주세요.

require("../Ex/my_db.php");

$conn = null;

try{

    $conn = my_db_conn(); // PDO 획득
    $conn->beginTransaction(); //트랜잭션 시작

    $sql =
        " update salaries "
        ." set "
        ." end_at = date(now()) "
        ." where "
        ." emp_id = :emp_id1 "
    ;

    $arr_prepare = [
        "emp_id1" => 100020
    ];
    
    $stmt = $conn->prepare($sql); // 쿼리준비
    $result_flg = $stmt->execute($arr_prepare); //쿼리실행
    $result_cnt = $stmt->rowCount(); // 영향받은 레코드 수 변환 

    // 쿼리 실행 예외 처리
    if(!$result_flg) {
        throw new Exception("update Query Error : salaries ");
    }

    // 영향받은 레코드 수 예외 처리
    if($result_cnt !== 1) {
        throw new Exception("update count Error : salaries ".", count : ".$result_cnt );
    }

    //급여테이블 insert
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
    $result_cnt = $stmt->rowCount();    // 영향받은 레코드 수 획득

    // 쿼리 실행 예외 처리
    if(!$result_flg) {
        throw new Exception("insert Query Error : salaries");
    }

    // 영향받은 레코드 수 예외 처리
    if($result_cnt !== 1) {
        throw new Exception("Insert count Error : salaries");
    }

    $conn->commit();
} catch(Throwable $th) {
    if(!is_null($conn)) {
        $conn->rollBack();
    }
    echo $th->getMessage();
}