const NAV = `<nav><a class="nav-link" href="./library/loginController.php?logout=true"> Sign out</a></nav>`;

const insertNav = () => {
	//get BODY element right at the start
	document.firstElementChild.lastElementChild.insertAdjacentHTML(
		"afterend",
		NAV
	);
};

insertNav();
