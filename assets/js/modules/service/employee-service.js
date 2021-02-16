
export const EMPLOYEE_URL = '../src/library/employeeController.php';

export function deleteEmployee(id, onSucess) {
	axios.delete(EMPLOYEE_URL, {
			params: {
				id: id,
			},
		})
		.then(onSucess);
}

export function addEmployee(employee, onSuccess) {
	axios.post(
		EMPLOYEE_URL, employee
	)
	.then(onSuccess);
}

