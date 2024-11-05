<?php
namespace Models;

use Throwable;
use PDO;

class Model {
    protected $conn;

    public function __construct() {
        try {
            $opt = [
                PDO::ATTR_EMULATE_PREPARES      => false // DB의 prepared Statment 기능을 사용하도록 설정
                ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION // PDO Exception을 Throw 하도록 설정
                ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC // 연관 배열로 Fetch설정
            ];

            $this->conn = new PDO(_MARIA_DB_DNS, _MARIA_DB_USER, _MARIA_DB_PASSWORD, $opt);
        } catch(Throwable $th) {
            echo 'Model->__construct(), '.$th->getMessage();
            exit;
        }

    }
    // 트랜잭션 시작
    public function beginTransaction() {
        $this->conn->beginTransaction();
    }

    // 커밋
    public function commit() {
        $this->conn->commit();
    }

    // 롤백
    public function rollBack() {
        $this->conn->rollBack();
    }
}