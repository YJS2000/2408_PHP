-- INSERT문 : 신규 데이터를 저장

-- 기본구조
-- INSERT INTO 테이블명 (컬럼1, 컬럼2)
-- VALUES (값1, 값2...)

INSERT INTO employees(
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
VALUES(
	'윤종승'
	,'2000-11-15'
	,'M'
	,'2024-09-02'
	,null
	,null
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,null
);

-- select insert 
INSERT INTO employees(
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
select
	name
	,birth
	,gender
	,hire_at
	,fire_at
	,sup_id
	,created_at
	,updated_at
	,deleted_at
FROM employees
WHERE emp_id IN (1, 2)
;

-- 자신의 직급 정보 삽입
INSERT INTO title_emps(
	emp_id
	,title_code
	,start_at
	,end_at
	,created_at
	,updated_at
	,deleted_at
)
VALUES (
	100002
	,'T002'
	,'2024-09-02'
	,null
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,null
);
	
-- 자신의 급여 정보 삽입
INSERT INTO salaries(
	emp_id
	,salary
	,start_at
	,end_at
	,created_at
	,updated_at
	,deleted_at
)
VALUES(
	100002
	,26000000
	,'2024-09-02'
	,null
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,null
);
	
	
	
-- 자신의 소속부서 삽입
INSERT INTO department_emps(
	emp_id
	,dept_code
	,start_at 
	,end_at
	,created_at
	,updated_at
	,deleted_at
)
VALUE(
	100002
	,'d006'
	,'2024-09-02'
	,null
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,NULL
);


	
	
