const form = document.querySelector("#employee-form");

form.addEventListener("submit", function (event) {
	event.preventDefault();

	const data = Object.fromEntries(new FormData(event.target));
	const method = data.id ? "PUT" : "POST";
	console.log(data, method);

	fetch("./library/employeeController.php", {
		method,
		body: JSON.stringify(data, null, 2),
	})
		.then((response) => {
			response.text();
		})
		.then((data) => {
			console.log(data);
		})
		.catch((error) => {
			console.log(error);
		});
});
