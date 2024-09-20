<?php

$data = [
    "name" => "둘리"
    ,"gender" => "M"
    ,"birth" => "1990-01-01"
];

$sql =
    " SELECT * "
    ." FROM employees "
;

$where = "";
$arr_prepare = [];

foreach($data as $key => $val) {
    // where절 작성
    if(empty($where)) {
        $where .= " where ";
    } else {
        $where .= " AND ";
    }
    $where .= " ".$key." = :".$key;

    // prepared statement 작성
    $arr_prepare[$key] = $val;
}
$sql .= $where;

echo $sql;

print_r($arr_prepare);
