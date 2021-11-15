/**
 * This function sets the counter to zero.
 * @param {int} counter the counter that needs to be reseted
 * @returns {int} time in ms when session was started.
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
			// sets in session storage de time of session was started
			sessionStorage.setItem("creationTime", request.responseText);
			let serverResponseParsed = JSON.parse(request.response);
			console.log("initial time in ms: ", serverResponseParsed);
			return serverResponseParsed;
		} else {
			console.log("error");
		}
	};
	request.send(json_upload);
}
/**
 * This function resets the timer to zero
 * if there is activity on the client side.
 */
function resetTimer() {
	// if the key initialTime exists:
	if (sessionStorage.getItem("timer")) sessionStorage.setItem("timer", 0);
	if (sessionStorage.getItem("reset")) sessionStorage.setItem("reset", true);

	starts();
}

/**
 * This functions starts the timer for
 * session expiration
 * @param {int} END_SESSION_TIME expiration time, setted to 10 secs
 * @returns the timeout ID
 */
function starts(END_SESSION_TIME = 10000) {
	sessionStorage.setItem("reset", false);
	// sets in Session storage initialTime
	if (sessionStorage.getItem("timer") != 0) sessionStorage.setItem("timer", 0);
	let timer = JSON.parse(sessionStorage.getItem("timer"));

	let interval = setInterval(() => {
		timer++;
		sessionStorage.setItem("timer", timer);
	}, 1000);

	timerClock(END_SESSION_TIME, interval);
}

/**
 * Sets the timeout for the session to end.
 * @param {int} time : session duration in ms
 */
function timerClock(time, interval) {
	let timer = setTimeout(() => {
		clearInterval(interval);
		endSessionPopUp();
	}, time);
	clearTimeout(timer);
}

/**
 * Pops up a warning for ending the session,
 * if client needs more time the session starts over
 * if not the session ends. Uses https://sweetalert2.github.io/
 */
function endSessionPopUp() {
	// pop up
	Swal.fire({
		title: "Need more time?",
		text: "¡Your session expired!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes!",
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire("You can continue", "10 more mins to go!", "success");
			resetTimer();
		} else if (result.dismiss === Swal.DismissReason.cancel) {
			endSession();
		} else if (result.dismiss === Swal.DismissReason.close) {
			endSession();
		}
	});
}

/**
 * endSession() : if the time run out
 * Tell the server to end the sesssion through AJAX
 */
function endSession() {
	// send reset request to php session Helper
	console.log("end session");
	let request = new XMLHttpRequest();

	let json_upload =
		"json_endSession=" + JSON.stringify({ end_session: true, start: false });

	request.open("POST", "../src/library/sessionHelper.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.onload = () => {
		if (request.readyState == 4 && request.status == "200") {
			console.log("success");
		} else {
			console.log("error");
		}
	};
	request.send(json_upload);

	// sends by GET the expired session and reload the server
	window.location.search = "expired=true";
	window.location.reload();
}

/**
 * Initialize de timer when the window loads
 */
function initializate() {
	getInitialTime();
	starts();
}

// get initial Time
window.addEventListener("load", initializate);

// reset the timer
window.addEventListener("keypress", resetTimer);
window.addEventListener("mousemove", resetTimer);
window.addEventListener("click", resetTimer);
