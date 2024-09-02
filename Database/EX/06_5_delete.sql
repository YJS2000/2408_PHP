-- DELETE문 :기존 데이터를 삭제

-- 기본구조
-- DELETE FROM 테이블명
-- WHERE 조건;

-- 나의 급여정보 삭제
SELECT *
FROM salaries
WHERE emp_id = 100002
;

DELETE from salaries
WHERE emp_id = 100002
;

SELECT *
FROM salaries
WHERE emp_id = 100002
;

-- 자식의 직급 정보를 삭제해주세요

DELETE from title_emps
WHERE emp_id = 100002
;

SELECT *
FROM title_emps
WHERE emp_id = 100002
;