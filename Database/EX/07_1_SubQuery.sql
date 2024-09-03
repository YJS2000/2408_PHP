-- 단일행서브쿼리
SELECT
	employees.emp_id
	,employees.name
FROM employees
WHERE 
		employees.emp_id=(
		SELECT department_managers.emp_id
			FROM department_managers
		WHERE 
			department_managers.end_at IS null
			AND department_managers.dept_code = 'D001'
			)
;
-- 다중행서브쿼리
SELECT
	employees.emp_id
	,employees.name
FROM employees
WHERE 
		employees.emp_id in(
		SELECT department_managers.emp_id
			FROM department_managers
		WHERE 
			department_managers.end_at IS null
			)
;

-- select절 에서사용
SELECT
	employees.emp_id
	,employees.name
	,(
		SELECT AVG(salaries.salary)
		FROM salaries
		WHERE 
			salaries.emp_id = employees.emp_id
	) AS avg_sal
FROM employees
;


-- FROM절에 사용되는 Sub Query
SELECT
	TMP.*
FROM (
	select
		employees.emp_id
		,employees.name
	FROM employees
) AS TMP
;

-- insert문에서 sub query 사용
INSERT INTO employees (
	name
	,birth
	,gender
	,hire_at
	,fire_at
	,sup_id
	,created_at
	,updated_at
	,deleted_at
)
VALUE (
	(SELECT emp.NAME FROM employees emp WHERE emp.emp_id = 1000)
	,'2000-01-01'
	,'M'
	,DATE(NOW())
	,null
	,null
	,NOW()
	,NOW()
	,NUll
);
	
-- update문에서 subquery 사용
UPDATE employees
SET 
	employees.gender = (
	SELECT emp.gender
	FROM employees emp
	WHERE emp.emp_id = 100000
	)
WHERE 
	employees.emp_id = (
	SELECT MAX(emp2.emp_id)
	FROM employees emp2 
	);

