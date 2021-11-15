import { displayNotification } from "./utils.js";

(function setSubmitEvent() {
	const form = document.querySelector("#employee-form");

	form.addEventListener("submit", function (event) {
		event.preventDefault();

		const form = event.target;
		const data = Object.fromEntries(new FormData(form));
		const method = data.id ? "PUT" : "POST";
		console.log(data, method);

		fetch("./library/employeeController.php", {
			method,
			body: JSON.stringify(data, null, 2),
		})
			.then((response) => {
				return response.json();
			})
			.then((data) => {
				displayNotification(data);
				form.reset();
			})
			.catch((error) => {
				displayNotification(error);
			});
	});
})();
