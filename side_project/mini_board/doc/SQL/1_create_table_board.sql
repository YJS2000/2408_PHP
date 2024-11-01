CREATE DATABASE if NOT EXISTS mini_board;

USE mini_board;

DROP TABLE if EXISTS board;

CREATE TABLE board(
	id BIGINT(20) unsigned primary KEY AUTO_INCREMENT
	,title VARCHAR(50) NOT null
	,content VARCHAR(50) NOT null
	,created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at TIMESTAMP
);
	