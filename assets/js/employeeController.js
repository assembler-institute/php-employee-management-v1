import { displayNotification } from "./utils.js";

const controller = {
	loadData: function (item) {
		return $.ajax({
			type: "GET",
			url: "../resources/employees.json",
			dataType: "json",
			data: JSON.stringify(item),
		});
	},
	insertItem: function (item) {
		fetch("./library/employeeController.php", {
			method: "POST",
			headers: {
				"Content-Type": "application/json",
			},
			body: JSON.stringify(item),
		})
			.then((response) => {
				return response.json();
			})
			.then((data) => {
				displayNotification(data);
			});
	},
	deleteItem: function (item) {
		fetch("./library/employeeController.php", {
			method: "DELETE",
			body: JSON.stringify(item),
		})
			.then((response) => {
				return response.json();
			})
			.then((data) => {
				displayNotification(data);
			});
	},
	updateItem: function (item) {
		fetch("./library/employeeController.php", {
			method: "PUT",
			body: JSON.stringify(item),
		})
			.then((response) => {
				return response.json();
			})
			.then((data) => {
				displayNotification(data);
			});
	},
};

export { controller };
