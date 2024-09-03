-- join문
-- 두개이상의 테이블을 묶어서 하나의 결과 집합으로 출력

-- INNER JOIN
-- 두 테이블이 공통적으로 만족하는 레코드를 출력(교집합)
-- 사원 번호, 이름, 소속부서코드를 출력

SELECT
	employees.emp_id
	,employees.name
	,department_emps.dept_code
	,departments.dept_name
FROM employees
	JOIN department_emps
		ON employees.emp_id = department_emps.emp_id
		and department_emps.end_at is NULL 
	JOIN departments
		ON departments.dept_code = department_emps.dept_code
;

-- LEFT OUTER JOIN
-- 
-- LEFT JOIN이라고 줄여서 부름
-- 왼쪽 테이블을 기준 테이블로 두고 JOIN을 실행
-- 기준 테이블의 모든 데이터를 출력하고 
-- 조인 대상 테이블에 없는 값은 NULL로 출력

-- 사원의 사번, 이름, 부서장 시작날짜
SELECT
	employees.emp_id
	,employees.name
	,department_managers.start_at
FROM employees
	LEFT JOIN department_managers
		ON employees.emp_id = department_managers.emp_id
WHERE 
	department_managers.end_at IS null
ORDER BY department_managers.start_at DESC
;

-- RIGHT OUTER JOIN

-- RIGHT JOIN이라고 줄여서 부름
-- 오른쪽 테이블을 기준 테이블로 두고 JOIN을 실행
-- 기준 테이블의 모든 데이터를 출력하고 
-- 조인 대상 테이블에 없는 값은 NULL로 출력

-- 모든사원 사원의사번, 이름 ,부서장 시작날짜

SELECT
	employees.emp_id
	,employees.name
	,department_managers.start_at
FROM department_managers
	RIGHT JOIN employees
		ON department_managers.emp_id = employees.emp_id
WHERE
	department_managers.end_at IS null
ORDER BY department_managers.start_at desc
;


-- 두개 이상의 쿼리의 결과를 합쳐서 출력
-- UNION			(중복제거)
-- UNION ALL	(중복제거 안함)
SELECT * FROM employees WHERE emp_id IN(1,3)
UNION all
SELECT * FROM employees WHERE emp_id IN(3,6)
;

-- SELF JOIN
-- 자기 자신을 조인
-- 슈퍼바이저인 사원의 정보 출력
SELECT
	emp1.emp_id
	,emp1.name
FROM employees emp1
	JOIN employees emp2
		ON emp1.emp_id = emp2.sup_id