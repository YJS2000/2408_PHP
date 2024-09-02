-- UPDATE 문 : 기존 데이터를 수정

-- 기본 구조
-- UPDATE 테이블명
-- set 컬럼1 = 값1, 컬럼2 = 값2...
-- where 조건 
UPDATE employees
SET 
	gender = 'F'
	,updated_at = NOW()
WHERE emp_id = 100002
;

-- 나의 직급을 'T005'로 변경해주세요
SELECT * 
FROM title_emps 
WHERE emp_id = 100002 AND end_at IS NULL
;

UPDATE title_emps
SET 
	title_code = 'T005'
WHERE emp_id = 100002
;

SELECT * 
FROM title_emps 
WHERE emp_id = 100002 AND end_at IS NULL
;
-- 현재 급여가 26,000,000만원 이하인 직원의 급여를 
-- 50,000,000만원으로 수정해주세요.

SELECT * 
FROM salaries
WHERE salary <= 26000000 AND end_at IS NULL;

UPDATE salaries
SET
	salary = 50000000, UPDATEd_at = NOW()
WHERE 
	salary <= 26000000 AND 
	end_at IS NULL
;

SELECT * 
FROM salaries
WHERE salary = 50000000 AND end_at IS NULL;