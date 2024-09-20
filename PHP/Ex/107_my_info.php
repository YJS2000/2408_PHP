<?php
// 나의 사원 정보를 입력(급여, 직급, 부서 정보 포함)

require("./my_db.php");

$conn = null;

try{
    // PDO 획득
    $conn = my_db_conn();
    // 트랜잭션 시작
    $conn->beginTransaction();

    //사원테이블 insert
    $sql =
        " INSERT INTO employees( "
        ." name "
        ." ,birth "
        ." ,gender "
        ." ,hire_at "
        ." ) "
        ." VALUES( "
        ." :name "
        ." ,:birth "
        ." ,:gender "
        ." ,date(now())"
        ." ) "
    ;

    $arr_prepare = [
        "name"      =>"윤종승"
        ,"birth"    =>"2000-11-15"
        ,"gender"   =>"M"
    ];

    $stmt = $conn->prepare($sql); // 쿼리 준비
    $result_flg = $stmt->execute($arr_prepare); // 쿼리실행
    $result_cnt = $stmt->rowCount();    // 영향받은 레코드 수 획득

    // 쿼리 실행 예외 처리
    if(!$result_flg) {
        throw new Exception("insert Query Error : employees");
    }

    // 영향받은 레코드 수 예외 처리
    if($result_cnt !== 1) {
        throw new Exception("Insert count Error : employees".", count : ".$result_cnt );
    }


    // insert한 pk획득
    $emp_id = $conn->lastInsertId();

//---------------------------------------------------------------
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
        "emp_id" => $emp_id
        ,"salary" => 10000000
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

    // ----------------------------------
    // 직급테이블 insert
    $sql = 
    "INSERT INTO title_emps( "
    ." emp_id "
    ." ,title_code "
    ." ,start_at "
    ." ) "
    ." values( "
    ." :emp_id "
    ." ,:title_code "
    ." ,date(now())"
    ." ) "
;
    $arr_prepare = [
        "emp_id" => $emp_id
        ,"title_code" => "T001"
    ];

    $stmt = $conn->prepare($sql); // 쿼리 준비
    $result_flg = $stmt->execute($arr_prepare); // 쿼리실행
    $result_cnt = $stmt->rowCount();    // 영향받은 레코드 수 획득

    // 쿼리 실행 예외 처리
    if(!$result_flg) {
        throw new Exception("insert Query Error : title_emps");
    }

    // 영향받은 레코드 수 예외 처리
    if($result_cnt !== 1) {
        throw new Exception("Insert count Error :  title_emps");
    }

    // 소속부서테이블 insert
        $sql = 
        "INSERT INTO department_emps( "
        ." emp_id "
        ." ,dept_code "
        ." ,start_at "
        ." ) "
        ." values( "
        ." :emp_id "
        ." ,:dept_code "
        ." ,date(now())"
        ." ) "
    ;
    $arr_prepare = [
        "emp_id" => $emp_id
        ,"dept_code" => "D001"
    ];

    $stmt = $conn->prepare($sql); // 쿼리 준비
    $result_flg = $stmt->execute($arr_prepare); // 쿼리실행
    $result_cnt = $stmt->rowCount();    // 영향받은 레코드 수 획득

    // 쿼리 실행 예외 처리
    if(!$result_flg) {
        throw new Exception("insert Query Error : department_emps");
    }

    // 영향받은 레코드 수 예외 처리
    if($result_cnt !== 1) {
        throw new Exception("Insert count Error : department_emps");
    }


    // commit
    $conn->commit();
} catch(Throwable $th) {
    if(!is_null($conn)) {
        $conn->rollBack();
    }
    echo $th->getMessage();
}