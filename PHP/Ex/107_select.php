<?php

require_once("./my_db.php");

try {
    $conn = my_db_conn();

    $id = 1;
    //prepared_statement
    $sql = " SELECT "
           ."*"
           ." from employees " 
           ." where "
           ." emp_id = :emp_id "
    ;
    $arr_prepare = [
        "emp_id"=>$id
    ];
    
    $stmt = $conn->prepare($sql); //DB 질의준비
    $stmt->execute($arr_prepare); //질의 실행
    $result = $stmt->fetchAll(); //질의 결과 패치
    
    print_r($result);

} catch (Throwable $th) {
    echo $th ->getMessage(); //예외 메세지 출력
}
