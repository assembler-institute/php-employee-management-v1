import { displayNotification } from "./notification.js";

(function setSubmitEvent() {
	const form = document.querySelector("#employee-form");

	form.addEventListener("submit", function (event) {
		event.preventDefault();

		const form = event.target;
		const data = Object.fromEntries(new FormData(form));
		const method = data.id ? "PUT" : "POST";

		fetch("./library/employeeController.php", {
			method,
			body: JSON.stringify(data, null, 2),
		})
			.then((response) => {
				return response.json();
			})
			.then((data) => {
				displayNotification(data);
				if (method === "POST") form.reset();
			})
			.catch((error) => {
				displayNotification(error);
			});
	});
})();

(function setAvatarUpdate() {
	document.addEventListener("click", function (event) {
		const userAvatar = document.querySelector("#user-avatar");
		const inputAvatar = document.querySelector("#avatar");

		if (event.target.matches(".avatar-btn")) {
			const newAvatar = event.target.children[0];

			userAvatar.src = newAvatar.src;
			inputAvatar.value = newAvatar.src;
		}
	});
})();
