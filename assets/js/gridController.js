import { displayNotification } from "./notification.js";

function getControllerQuery(method, item) {
	const METHODS = ["GET", "PUT", "POST", "DELETE"];

	if (!METHODS.includes(method)) {
		displayNotification({ type: "danger", message: "Wrong HTTP method." });
	}

	return fetch("./library/employeeController.php", {
		method,
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
			console.log(data);
			if (data.type !== "success") return Promise.reject();

			if (method === "POST") {
				return Promise.resolve({ ...item, id: data.id });
			}
		});
}

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
		return getControllerQuery("POST", item);
	},
	deleteItem: function (item) {
		return getControllerQuery("DELETE", item);
	},
	updateItem: function (item) {
		return getControllerQuery("PUT", item);
	},
};

export { controller };
