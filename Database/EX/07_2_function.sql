-- 내장함수 : 데이터를 처리하고 분석하는데 사용하는 프로그램

-- 데이터 타입 변환 함수
-- CAST(값 AS 데이터타입)
-- CONVERT(값 데이터타입)
SELECT
	1234
	,CAST(1234 AS CHAR(4))
	,CONVERT(1234, CHAR(4))
;

-- 제어 흐름 함수
-- IF(수식, 참일 때, 거짓일 때)
-- 수식의 참 또는 거짓에 따라 결과를 분기하는 함수
SELECT
	emp_id
	,gender
	,if(gender='M','남자','여자') AS ko_gender
FROM employees
;

-- IFNULL(수식1, 수식2)
-- 수식1이 null이면 수식2를 반환
-- 수식1이 null이 아니면 수식1을 반환
SELECT 
	emp_id
	,fire_at
	,IFNULL(fire_at, '9999-01-01') as fire_at_not_null
FROM employees
;

-- NULLIF(수식1, 수식2)
-- 수식1과 수식2가 일치하는지 체크를하고
-- 참이면 NULL을 반환, 거짓이면 수식1을 반환
SELECT
	emp_id
	,gender
	,nullif(gender, 'F')
FROM employees
;

-- CASE 체크하려는수식 
-- 	WHEN 분기수식1 THEN 결과1
-- 	WHEN 분기수식2 THEN 결과2
-- 	ELSE 결과4
--  END
SELECT
	emp_id
	,case gender
		when 'M' then '남자'
		when 'F' then '여자'
		ELSE '모름'
	END AS ko_gender
FROM employees
;

SELECT
	emp_id
	,salary
	,case 
		when salary <= 30000000
			then '평범'
		ELSE '많다'
	END AS '조사'
FROM salaries
;



-- -----------
-- 문자열 함수
-- -----------
-- concat(문자열1, 문자열2...)
-- 문자열을 연결하는 함수
SELECT CONCAT('안녕하세요.',' ','DB입니다.');

-- concat_WS(구분자, 문자열1, 문자열2...)
-- 문자열 사이에 구분자를 넣어 연결하는 함수
SELECT CONCAT_WS(', ','딸기','바나나','수박','자두');

-- FORMAT(숫자, 소수점 자릿수)
SELECT FORMAT(50000,0);

-- LEFT(문자열, 숫자)
-- 문자열을 왼쪽부터 숫자길이 만큼 잘라 반환
SELECT LEFT('abcde',2);
-- RIGHT(문자열, 숫자)
-- 문자열을 오른쪽부터 숫자길이 만큼 잘라 반환
SELECT right('abcde',2);

-- UPPER(문자열)
-- 소문자를 대문자로 변경
SELECT UPPER('abcdE');

-- LOWER(문자열)
-- 대문자를 소문자로 변경
SELECT LOWER('ABCDe');

-- LPAD(문자열, 길이, 채울 문자열)
-- 문자열을 포함해 길이만큼 채울 문자열을 왼쪽에 삽입해 반환
SELECT LPAD('321',5, '0');

-- RPAD(문자열, 길이, 채울문자열)
-- 문자열을 포함해 길이만큼 채울 문자열을 오른쪽에 삽입해 반환
SELECT RPAD('321',5, '0');

-- TRIM(문자열)
-- 좌우 공백을 제거
SELECT TRIM('     sd   sd  ');

-- RTRIM(문자열 : 우공백 제거
SELECT rTRIM('     sd   sd  ');
-- LTRIM(문자열) : 좌공백 제거
SELECT lTRIM('     sd   sd  ');

-- TRIM(방향 문자열1 FROM 문자열2)
-- 방향을 지정해서 문자열 2에서 문자열1을 제거하여 반환
-- 방향은 LEADING(좌), BOTH(좌우), TRAILING(우) 지정 가능
SELECT TRIM(both 'ab' FROM 'abcdeab');

-- SUBSTING(문자열, 시작위치, 길이)
-- 문자열을 시작위치에서 길이만큼 잘라서 반환
SELECT
	SUBSTRING('abcdef',3,2)
;

-- SUBSTRING_INDEX(문자열, 구분자, 횟수)
-- 왼쪽부터 구분자가 횟수번째가 나오면 그 이후부터 버림
-- 횟수를 음수로 설정시 오른쪽부터 적용
SELECT
	SUBSTRING_index('미어켓_그린_테스트','_',-1)
;


-- -------------
-- 수학함수
-- -------------

-- CEILING(값) :올림
-- FLOOR(값) : 버림
-- ROUND(값) : 반올림
SELECT CEILING(1.2), FLOOR(1.9), ROUND(1.5);

-- TRUNCATE(값, 정수)
-- 소수점 기준으로 정수위치까지 구하고 나머지는 버림
SELECT TRUNCATE(1.2345, 2);

-- ----------------
-- 날짜 및 시간 함수
-- ----------------
-- NOW() : 현재 날짜및 시간을 반환(YYYY-MM-DD hh:mi:ss)
SELECT NOW();

-- DATE(데이트형식의 값)
-- 해당 값을 YYYY-MM-DD 형식으로 변환
SELECT DATE(NOW());

-- ADDDATE(날짜1, INTERVAL 날짜2)
SELECT ADDDATE('2024-01-01',INTERVAL 1 YEAR);
SELECT ADDDATE('2024-01-01',INTERVAL -1 YEAR);
SELECT ADDDATE('2024-01-01',INTERVAL 1 MONTH);
SELECT ADDDATE('2024-01-01',INTERVAL -1 MONTH);
SELECT ADDDATE('2024-01-01',INTERVAL 1 week);
SELECT ADDDATE('2024-01-01',INTERVAL -1 week);
SELECT ADDDATE('2024-01-01',INTERVAL 1 DAY);
SELECT ADDDATE('2024-01-01',INTERVAL -1 DAY);

-- ---------
-- 직계함수
-- ---------
-- SUM(컬럼) : 해당 컬럼의 합계를 출력
-- MAX(컬럼) : 해당 컬럼의 최대값 출력
-- MIN(컬럼) : 해달 컬럼의 최소값 출력
-- AVG(컬럼) : 해당 컬럼의 평균 출력
-- COUNT(컬럼) : 해당컬럼의 총수를 출력
SELECT 
	SUM(salary)
	,max(salary)
	,min(salary)
	,avg(salary)
FROM salaries;

-- count(*)검색 결과의 총 레코드 수를 출력
-- count(컬럼)검색 결과중 해당 컬럼의 값이 NULL이 아닌 레코드의 수를 출력
SELECT
	COUNT(fire_at)
	,COUNT(*)
FROM employees;

-- ----------
-- 순위 함수
-- ----------
SELECT
	emp_id
	,salary
	,RANK() OVER(ORDER BY salary DESC) AS sal_rank
FROM salaries
LIMIT 5;

