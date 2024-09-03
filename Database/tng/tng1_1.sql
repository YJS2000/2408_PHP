-- 1. 직책테이블의 모든정보를 조회해주세요.
SELECT *
FROM titles
;

-- 2. 급여가 60,000,000 이하인 사원의 사번을 조회해주세요
SELECT emp_id
FROM salaries
WHERE 
	salary <= 60000000
;
	
-- 3. 급여가 60,000,000 에서 70,000,000인 사원의 사번을 조회해주세요.
SELECT emp_id
FROM salaries
WHERE 
	salary >= 60000000 and salary <=70000000
;

-- 4.사원번호가 10001, 10005인 사원의 사원테이블의 모든정보를 조회해주세요.
SELECT *
FROM employees
WHERE
	emp_id = 10001 OR emp_id = 10005
;

-- 5. 직급에 '사'가 포함된 직급코드와 직급명을 조회해주세요.
SELECT title, title_code
FROM titles
WHERE
  title LIKE '%사%'
;

-- 6.사원 이름 오른차순으로 정렬해서 조회해주세요.
SELECT NAME
FROM employees
ORDER BY NAME asc
;

-- 7. 사원별 전체 급여의 평균을 조회해주세요
SELECT AVG(salary)
FROM salaries
GROUP BY emp_id
;

-- 8. 사원별 전체 급여의 평균이 30,000,000 ~ 50,000,000인, 사원번호와 평균급여를 조회해주세요
SELECT emp_id, AVG(salary)
FROM salaries
GROUP BY emp_id
	HAVING AVG(salary) >= 30000000 and AVG(salary) <= 50000000
;

-- 9. 사원별 전체 급여 평균이 70,000,000이상인, 사원의 사번 이름 성별을 조회해주세요
SELECT emp_id, NAME, gender
FROM employees
WHERE 
	emp_id in (
		SELECT emp_id
		FROM salaries
		GROUP BY emp_id
			HAVING AVG(salary) >= 70000000
	)
;

-- 10. 현재 직급이 'T005'인 사원의 사원번호와 이름을 조회해주세요
SELECT emp_id, NAME
FROM employees
WHERE 
	emp_id in (
		SELECT emp_id
		FROM title_emps
		WHERE title_code = 'T005' and
		end_at IS NULL 
	)
;

	