(function setNavLinkActive() {
	const navLinkList = document.querySelectorAll(".nav-link");

	navLinkList.forEach((navLink) => {
		const pageName = location.pathname.toLowerCase().split("/").slice(-1)[0];
		const linkName = navLink.textContent.toLowerCase();

		if (pageName.includes(linkName)) {
			navLink.classList.add("active");
		}
	});
})();
