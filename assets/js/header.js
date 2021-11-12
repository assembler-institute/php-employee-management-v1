(function setNavLinkActive() {
	const navLinkList = document.querySelectorAll(".nav-link");

	navLinkList.forEach((navLink) => {
		if (location.pathname.toLowerCase().includes(navLink.textContent.toLowerCase())) {
			navLink.classList.add("active");
		}
	});
})();
