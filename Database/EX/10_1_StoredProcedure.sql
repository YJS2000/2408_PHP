-- 프로시저 생성

DELIMITER $$

CREATE PROCEDURE add_emp(
	IN param_name VARCHAR(50)
	,IN param_birth VARCHAR(10)
	,IN param_gender CHAR(1)
)
BEGIN 
	DECLARE cup INT DEFAULT 0;

	INSERT INTO employees (
		NAME1
		,birth
		,gender
		,hire_at
	)
	VALUES (
		param_name
		,param_birth
		,param_gender
		,DATE(NOW())
	);
	

	
-- 	방금입력한 사원 번호 조회
	SELECT emp_id
	INTO @cup
	FROM employees
	ORDER BY emp_id desc
	LIMIT 1
	;
	
-- 	급여 테이블 데이터 작성
	INSERT salaries(
		emp_id
		,salary
		,start_At
	)
	VALUES (
		@cup
		,25000000
		,DATE(NOW())
	);	
	
	
END $$

DELIMITER ;
 
-- 프로시저 실행
CALL add_emp('노루', '2000-01-01', 'M');

-- 프로시저 삭제
DROP PROCEDURE add_emp;