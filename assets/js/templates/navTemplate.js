const NAV = `<nav><a class="nav-link" href="./library/loginController.php?logout=true"> Sign out </a></nav>`;

const insertNav = () => {
	//get BODY element right at the start

	console.log(document.getElementById("mainContainer"));
	document
		.getElementById("mainContainer")
		.insertAdjacentHTML("beforeBegin", NAV);
};

insertNav();
