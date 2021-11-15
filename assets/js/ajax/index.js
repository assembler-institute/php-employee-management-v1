// submit the data via XHR
function sendCounter(counter) {
	let request = new XMLHttpRequest();
	request.open("POST", "../src/library/sessionTimeout.php");
	request.setRequestHeader("Content-type", "application/json");
	request.onload = () => {
		if (request.readyState == 4 && request.status == "200") {
			console.log("succes");
		} else {
			console.log("error");
		}
	};
	request.send(counter);
	e.preventDefault();
}
