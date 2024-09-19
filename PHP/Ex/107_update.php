<?php

require("./my_db.php");

$conn = null;

try{
    //PDO Class 인스턴스화
    $conn = my_db_conn();

    $sql = 
        " UPDATE employees "
        ." set "
        ."      name = :name "
        ."      ,updated_at = now() "
        ." where " 
        ."      emp_id = :emp_id1 "
    ;
    
    $arr_prepare = [
        "name" => "갑순이"
        ,"emp_id1" => 100001
    ];
    
    $conn->beginTransaction();
    
    $stmt = $conn->prepare($sql); // 쿼리준비
    $result_flg = $stmt->execute($arr_prepare); //쿼리실행
    $result_cnt = $stmt->rowcount(); // 영향받은 레코드 수 변환 

    if(!$result_flg) {
        throw new Exception("쿼리 실행 예외 상황 발생");
    }
    if($result_cnt !==1) {
        throw new Exception("수정 레코드수 이상");
    }

    $conn->commit(); // 커밋 처리

} catch(Throwable $th) {
    if(!is_null($conn)){
        $conn->rollBack();
    }
    echo $th->getMessage();
}