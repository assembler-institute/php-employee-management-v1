const form = document.querySelector("#employee-form");

form.addEventListener("submit", function (event) {
	event.preventDefault();

	const formData = new FormData(event.target);
	console.log(formData);
	for (const [name, value] of formData) {
		console.log(name, value);
	}
});
