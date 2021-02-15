import { update } from '../components/table.js';

export const EMPLOYEE_URL = 'http://localhost/php-employee-management-v1/src/library/employeeController.php';

export function deleteEmployee(id) {
	axios
		.delete(EMPLOYEE_URL, {
			params: {
				id: id,
			},
		})
		.then(() => {
			update();
		});
}
