function displayNotification({ type, message }) {
	const container = document.querySelector("#notification-box");

	container.innerHTML += `
		<div class="alert alert-${type} alert-dismissible fade show my-1 mx-1" role="alert">
			<span>${message}</span>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	`;
}

export { displayNotification };
