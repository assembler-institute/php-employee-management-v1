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
function resetCounter() {
	const COUNTER = 0;

	// sends ajax to php to set _session timer to zero
}
/** This function starts the timer
 * when the session starts. The session time created
 *
 *
 */

//need the counter from php or that to be an ajax for put
//
window.addEventListener("keypress", resetCounter);
window.addEventListener("mousemove", resetCounter);
window.addEventListener("click", resetCounter);
