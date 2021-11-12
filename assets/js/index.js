fetch("./library/employeeController.php", {
	method: "DELETE",
	headers: {
		"Content-Type": "application/json",
		Accept: "application/json",
	},
	body: JSON.stringify({
		id: 7,
	}),
})
	.then((response) => {
		response.text();
	})
	.then((data) => {
		console.log(data);
	});

// fetch("./library/employeeController.php", {
// 	method: "POST",
// 	headers: {
// 		"Content-Type": "application/json",
// 		Accept: "application/json",
// 	},
// 	body: JSON.stringify({
// 		name: "John",
// 		lastName: "Stuart",
// 	}),
// })
// 	.then((response) => {
// 		response.text();
// 	})
// 	.then((data) => {
// 		console.log(data);
// 	});
