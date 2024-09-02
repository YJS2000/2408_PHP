/*
	select문
	데이터를 조회하기위해 사용하는 쿼리
*/
-- 테이블에서 특정 컬럼만 조회하는 방법
SELECT 
	emp_id
	,NAME
FROM employees
;

-- 테이블의 모든 컬럼의 데이터 조회
-- *(Askerisk)
SELECT *
FROM employees
;

-- 직책 테이블의 모든 데이터를 조회해 주세요.
SELECT *
FROM titles
;

-- 모든 사원의 직급코드과 사번을 조회해주세요
SELECT title_code, emp_id
FROM title_emps
;

/*
 WHERE 절 : 특정 조건의 데이터를 조회할때 사용
*/
-- 사번이 10000번인 사원의 모든 정보를 조회해 주세요.
SELECT *
FROM employees
WHERE 
	emp_id = 10000
;

-- 이름이 '원성현'인 사원을 조회해주세요
SELECT 
	*
FROM employees
WHERE NAME = '원성현'
;

-- 비교연산자 : >, <, =, >= ,<= , !=
-- 4번이 6~10인 사원의 정보를 조회해주세요.
SELECT
	*
FROM employees
WHERE emp_id >= 6;

-- 생일이 1990-01-01 이후힌 사원
SELECT
	*
from employees
WHERE birth >= '1990101'
;

-- and, or : 복수의 조건을 적용시키는 키워드
-- 생일이 1990-01-01 이후이고, 남자사원을 조회해주세요.
SELECT 
	*
FROM employees
WHERE birth >= '1990-01-01' AND gender = 'M'
;


-- 이름이 원성현 이거나 반승현인 사원을 조회해주세요.
SELECT
	*
FROM employees
WHERE 
	NAME = '원성현'
	or NAME = '반승현'
;

-- 이름이 원성현 또는 반승현이고,
-- 생일이 1990-01-01 이후인 사원을 조회해주세요.
SELECT
	*
FROM employees
WHERE
	(
		NAME = '원성현' 
		OR NAME = '반승현'
	)
	AND birth >= '1990-01-01'
;

-- 이름이 원성현이고 생일이 1990-01-01 이후 이거나
-- 이름이 반승현인 사원 조회

SELECT
	*
FROM employees
where
	(
		NAME = '원성현'
		AND birth >= '1990-01-01'
	)
	OR NAME = '반승현'
;

-- 직급코드가 T001 또는 T002 이고, 
-- 직급시작일자가 2000-01-01이후인 
-- 사원의 사번과 직급코드를 조회해 주세요.

SELECT
	emp_id
	, title_code
FROM title_emps
WHERE
	(
		title_code = 't001'
		OR title_code = 't002'
	)
	AND START_at >= '2000-01-01'
;

-- 생일 2000-01-01 ~ 2001-01-01인 사원 정보 조회해주세요
SELECT 
	*
FROM employees
WHERE 
	birth >= '2000-01-01'
	and birth <= '2001-01-01'
;

-- in 연산자 : 지정한 값과 일치한 데이터 조회
-- 이름이 염문창, 지도연, 안소정 인 사원정보 조회해주세요
SELECT 
	*
FROM employees
WHERE
	NAME IN (
	'염문창'
	, '지도연'
	, '안소정'
	)
;
	
-- between 연산자 : 지정한 범위의 데이터를 조회
-- 생일 2000-01-01 ~ 2001-01-01인 사원 정보 조회해주세요
SELECT 
	*
FROM employees
WHERE
	birth BETWEEN
		'2000-01-01' 
		and '2000-01-01'
;

-- like 연산자 문자열의 내용을 조회할 때 사용
-- (대소문자 구분X)
-- 염씨인 사원정보 획득
SELECT 
	*
FROM employees
WHERE 
	name LIKE '염%'
;

-- _:언더바의 개수만큼 글자개수를 제한해서 조회
SELECT 
	*
FROM employees
WHERE 
	name LIKE '염_'
;


/*
	ORDER BY 절 : 데이터를 정렬
	AEC : 오름차순
	DESC : 내림차순 
*/
-- 모든사원을 이름 오름차순으로 정렬
SELECT 
	*
FROM employees
ORDER BY NAME asc
;

-- 여자 사원을 이름 오름 차순으로 정렬
SELECT *
FROM employees
WHERE gender = 'f'
ORDER BY NAME ASC
;

-- 여자 사원을 이름,생일  오름 차순으로 정렬
SELECT *
FROM employees
WHERE gender = 'f'
ORDER BY NAME ASC, birth asc
;

-- distinct 키워드 : 검색걸과에서 중복되는 
-- 레코드를 없애준다. 
-- 직급테이블에서 사원번호 조회
SELECT distinct title_code
FROM title_emps
;

/*
	GROUP BY 절 : 그룹으로 묶어서 조회 
	HAVING 절 : GROUP BY 절의 조건절 
	
	집계함수
		MAX () : 최대값
		MIN () : 최소갑
		COUNT() : 개수
		AVG() : 평균
		SUM() : 합계
*/
-- 사원별 최고 연봉 조회
SELECT 
	emp_id
	, max(salary)
FROM salaries
GROUP BY emp_id
;

-- 최고 연봉이 5000만원 이상인 사원 조회
SELECT
	emp_id
	,MAX(salary)
FROM salaries
GROUP BY emp_id 
	HAVING MAX(salary) >= 50000000
;

/*
	값인 NULL인 데이터 검색
	[컬럼명 IS NULL]
	값인 NULL이 아닌 데이터 검색
	[컬럼명 IS NOT NULL]
*/
-- 사원의 현재 소속 부서코드 조회하기
SELECT *
FROM department_emps
WHERE
	END_AT IS NULL
;

/*
	AS : 컬럼 또는 테이블에 별칭을 부여
*/
-- 부서별 소속 사원의 수를 구해주세요.

SELECT 
	DEPT_CODE
	, COUNT(*) AS cnt
FROM department_emps
WHERE
	END_AT IS NULL
GROUP BY DEPT_CODE
;

-- LIMIT, OFFSET : 출력하는 데이터의 개수를 제한
SELECT *
FROM employees
ORDER BY emp_id ASC
LIMIT 5 OFFSET 5;

-- 현제 받고있는 급여중 사원의 연봉 상위 5명을 조회해주세요
SELECT *
FROM salaries
WHERE end_at IS null
ORDER BY salary DESC
LIMIT 5
;

-- SELECT문의 기본 구조
SELECT [DISTINCT] [컬럼명]
FROM [테이블명]
WHERE [쿼리 조건]
GROUP BY [컬럼명] HAVING [집계함수 조건]
ORDER BY [컬럼명 ASC || 컬럼명 DESC]
LIMIT [n] OFFSET [n]
;





