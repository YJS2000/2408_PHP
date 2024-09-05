-- DB 생성
-- CREATE DATABASE shop;
-- 
-- DB 선택
USE shop;

-- DB 삭제
-- DROP DATABASE shop;

-- -------------
-- 테이블 생성
-- -------------

CREATE TABLE users(
	id	BIGINT(20) PRIMARY KEY AUTO_INCREMENT -- 숫자가 늘어남
	,NAME VARCHAR(50) NOT NULL 
	,addr VARCHAR(150) NOT null
	,gender CHAR(1) NOT NULL COMMENT 'M = 남자 F = 여자'
	,tel VARCHAR(20) NOT NULL COMMENT '- 제외 숫자만'
	,created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at TIMESTAMP 
);

CREATE TABLE orders(
	id	BIGINT(20) PRIMARY KEY AUTO_INCREMENT -- 숫자가 늘어남
	,user_id BIGINT(20) NOT null
	,order_id varchar(50) NOT null
	,total_price BIGINT(20) NOT null
	,created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at TIMESTAMP 
);

CREATE TABLE products (
	id	BIGINT(20) PRIMARY KEY AUTO_INCREMENT -- 숫자가 늘어남
	,product_name VARCHAR(100) NOT null
	,price BIGINT(20) NOT null
	,created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at TIMESTAMP 
);

-- 테이블 제거

-- DROP TABLE orders;
-- DROP TABLE users, products;

-- 테이블 비우기
-- truncate users;

-- ------------
-- ALTER : 테이블의 구조를수정하는 문
-- ------------
-- FK 추가방법
/* ALTER TABLE [테이블명] ADD CONSTRAINT [Constraint명] 
FOREIGN KEY (CONSTRAINT 부여 컬럼명) 
REFERENCES 참조테이블명(참조테이블 컬럼명) 
[ON DELETE 동작 / ON UPDATE 동작]; */

ALTER TABLE orders ADD CONSTRAINT FK_orders_user_id
FOREIGN KEY (user_id)orders
REFERENCES users(id);
-- [ON DELETE CASCADE];

-- 컬럼수정
ALTER TABLE users 
MODIFY COLUMN addr varchar(100) not null
;

-- 컬럼 추가
ALTER TABLE users 
add COLUMN birth date not null
;

-- 컬럼 제거
ALTER TABLE users 
DROP COLUMN birth 
;

-- pk 부호없음 추가
ALTER TABLE orders
DROP CONSTRAINT fk_orders_user_id;

ALTER TABLE users
MODIFY COLUMN id BIGINT(20) UNSIGNED AUTO_INCREMENT;

ALTER TABLE orders
MODIFY COLUMN user_id BIGINT(20) UNSIGNED NOt NULL;

ALTER TABLE orders 
ADD CONSTRAINT FK_orders_user_id
FOREIGN KEY (user_id)
REFERENCES users(id);

ALTER TABLE orders
MODIFY COLUMN id BIGINT(20) UNSIGNED AUTO_INCREMENT
;

ALTER TABLE products
MODIFY COLUMN id BIGINT(20) UNSIGNED AUTO_INCREMENT
;