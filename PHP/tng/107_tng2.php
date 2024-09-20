<?php
require("../Ex/my_db.php");

// 3명의 신규 사원 정보를 employees에 추가한다.

$data = [
    ["name" => "둘리", "birth" => "1986-01-01", "gender" => "M"]
    ,["name" => "희동이", "birth" => "1990-01-01", "gender" => "M"]
    ,["name" => "고길동", "birth" => "1968-01-01", "gender" => "M"]
];

$conn = null;

try {
    $conn = my_db_conn();

    // transaction
    $conn->beginTransaction();

    foreach($data as $item) {
        $sql =
            " INSERT INTO employees( "
            ."  name "
            ."  ,birth "
            ."  ,gender "
            ."  ,hire_at "
            ." ) "
            ." VALUES( "
            ."  :name "
            ."  ,:birth "
            ."  ,:gender "
            ."  ,DATE(now()) "
            ." ) "
        ;
        $arr_prepare =[
            "name" => $item["name"]
            ,"birth" => $item["birth"]
            ,"gender" => $item["gender"]
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
    

    }
    // commit
    $conn->commit();
} catch(Throwable $th) {
    if(!is_null($conn)) {
        $conn->rollBack();
    }
    echo $th->getMessage();
}