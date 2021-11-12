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
			body: JSON.stringify(item, null, 2),
		})
			.then((response) => {
				console.log(response.body);
				response.text();
			})
			.then((preview) => {
				console.log(preview);
			});
	},
	deleteItem: function (item) {
		fetch("./library/employeeController.php", {
			method: "DELETE",
			body: JSON.stringify(item, null, 2),
		})
			.then((response) => {
				response.json();
			})
			.then((data) => {
				console.log(data);
			});
	},
	updateItem: function (item) {
		fetch("./library/employeeController.php", {
			method: "PUT",
			body: JSON.stringify(item, null, 2),
		})
			.then((response) => {
				response.json();
			})
			.then((data) => {
				console.log(data);
			});
	},
};

export { controller };
