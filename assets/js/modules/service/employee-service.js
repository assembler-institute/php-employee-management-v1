import { update } from '../components/table.js';

export const EMPLOYEE_URL = '../src/library/employeeController.php';

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
