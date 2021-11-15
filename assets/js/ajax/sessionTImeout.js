// events: key down, click, mouse mouving
//counter ,  si llega al tiempo el pop up
// y que llame al heper

//form action session helper. en el formulario del aviso dice tu sesion esta por expirar, se muestar el count down y se ahce automatico
// si pone cancelar se pone el contador a 0, sino se manda un submit con un get al session helper que hace
// el session destroy y redirige a index.

/**
 * This function sets the counter to zero.
 * @param {int} counter the counter that needs to be reseted
 * @returns counter = 0;
 */
function getInitialTime() {
	// send reset request to php session Helper
	let request = new XMLHttpRequest();
	let json_upload =
		"json_getTime=" + JSON.stringify({ end_session: false, start: true });

	request.open("POST", "../src/library/sessionHelper.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.onload = () => {
		if (request.readyState == 4 && request.status == "200") {
			console.log("succes");
			localStorage.setItem("initialTime", request.responseText);
			let serverResponseParsed = JSON.parse(request.response);
			console.log(serverResponseParsed);
		} else {
			console.log("error");
		}
	};

	console.log(json_upload);
	request.send(json_upload);

	// sends ajax to php to set _session timer to zero
}

function resetsTimer() {
	// send reset request to php session Helper
	let request = new XMLHttpRequest();

	let json_upload =
		"json_resetTime=" + JSON.stringify({ end_session: true, start: false });

	request.open("POST", "../src/library/sessionHelper.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.onload = () => {
		if (request.readyState == 4 && request.status == "200") {
			console.log("succes");
			let serverResponseParsed = JSON.parse(request.response);
			console.log(serverResponseParsed);
		} else {
			console.log("error");
		}
	};
	request.send(json_upload);

	// sends ajax to php to set _session timer to zero
}

/** This function starts the timer
 * when the session starts. The session time created
 *
 *
 */

//need the counter from php or that to be an ajax for put
//
window.addEventListener("load", getInitialTime);
/* window.addEventListener("keypress", resetsTimer);
window.addEventListener("mousemove", resetsTimer);
window.addEventListener("click", resetsTimer); */
