<?php

require_once("./my_db.php");

try{
    $conn = my_db_conn();

    // sql
    $sql =
        " insert into employees( "
        ."      name  "
        ."      ,birth "
        ."      ,gender "
        ."      ,hire_at"
        ." ) "
        ." values( "
        ."      :name  "
        ."      ,:birth "
        ."      ,:gender "
        ."      ,now()"
        ." ) "
    ;
    $arr_prepare = [
        "name" => "홍길동"
        ,"birth" => "2000-01-01"
        ,"gender" => "M"
    ];

    // transaction 시작
    $conn->beginTransaction();

    $stmt = $conn->prepare($sql); // 쿼리 준비
    $exec_flg = $stmt->execute($arr_prepare); // 쿼리 실행
    $result_cnt = $stmt->rowCount(); // 영향받은 레코드수를 반환

    //쿼리 싱행 예외 처리
    if(!$exec_flg) {
        throw new Exception("execute 예외 발생"); // 강제로 예외 발생
    }
    if($result_cnt !==1){
        throw new exception("레코드수 이상"); // 강제로 예외 발생
    }

   // commit 처리
    $conn->commit();
} catch(Throwable $th) {
    // pdo 인서턴스화 했는지 확인
    if(!is_null($conn)){
        $conn->rollBack();
    };
    echo $th->getcode()." ".$th->getMessage();
}