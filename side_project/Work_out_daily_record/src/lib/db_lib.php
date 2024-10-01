<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");

function my_db_conn() {
    $option = [
        PDO::ATTR_EMULATE_PREPARES          => false
        ,PDO::ATTR_ERRMODE                  => PDO::ERRMODE_EXCEPTION
        ,PDO::ATTR_DEFAULT_FETCH_MODE       => PDO::FETCH_ASSOC
    ];

    return new PDO(MY_MARIADB_DSN, MY_MARIADB_USER, MY_MARIADB_PASSWORD, $option);
}

function my_board_total_count(PDO $conn) {
    $sql =
    " SELECT "
    ." count(*) cnt "
    ." from "
    ." daily_record "
    ." WHERE "
    ." deleted_at IS NULL "
    ;

    $stmt = $conn->query($sql);
    $result = $stmt->fetch();

    return $result["cnt"];
}       

function my_board_select_pagination(PDO $conn, array $arr_param) {
    // SQL
    $sql =
       " SELECT "
       ." * "
       ." from "
       ." daily_record "
       ." where "
       ." deleted_at is null "
       
       ." order by "
       ." created_at DESC "
       ." , id DESC "
       ." LIMIT :list_cnt offset :offset "
;

$stmt = $conn->prepare($sql);
$result_flg = $stmt->execute($arr_param);

if(!$result_flg) {
    throw new Exception("쿼리 실행 실패");
}

return $stmt->fetchAll();
}

function my_board_select_id(PDO $conn, array $arr_param) {
    $sql =
    " SELECT "
    ." * "
    ." from "
    ." daily_record "
    ." WHERE "
    ." id = :id "
    ;

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);

    if(!$result_flg) {
        throw new Exception("쿼리 실행 실패");
    }

    return $stmt->fetch();
}

function my_board_insert(PDO $conn, array $arr_param) {
    $sql =
        " INSERT INTO daily_record( "
        ." title "
        ." ,content "
        ." ) "
        ." VALUES ( "
        ." :title "
        ." ,:content "
        ." ) "
    ;

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);

    if(!$result_flg) {
        throw new Exception("쿼리 실행 실패");
    }

    $result_cnt = $stmt->rowCount();
    
    if($result_cnt !== 1) {
        throw new Exception("insert count 이상");
    }

    return true;
}

function my_board_update(PDO $conn, array $arr_param) {
    $sql =
        " UPDATE daily_record "
        ." SET "
        ." title = :title "
        ." ,content = :content "
        ." ,updated_at = now() "
        ." WHERE "
        ." id = :id "
    ;

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);

    if(!$result_flg) {
        throw new Exception("쿼리 실행 실패");
    }

    if($stmt->rowCount() !== 1) {
        throw new Exception("Update Count 이상");
    }

    return true;

}

function my_board_delete_id(PDO $conn, array $arr_param) {
    $sql =
        " UPDATE daily_record "
        ." set "
        ." updated_at = now() "
        ." ,deleted_at = now() "
        ." where "
        ." id = :id "
    ; 

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);

    if(!$result_flg) {
        throw new Exception("쿼리 실행 실패");
    }

    if($stmt->rowCount() !== 1) {
        throw new Exception("Delete Count 이상");
    }

    return true;

}