const FOOTER = `
<footer class="bg-dark text-center text-white mt-5">
    <!-- Copyright -->
    <div class="text-center p-3">
        © 2021 Copyright: Paola y Paris

    </div>
    <!-- Copyright -->
</footer>
`;

const insertFooter = () => {
	//get the body element
	document.lastElementChild.lastElementChild.insertAdjacentHTML(
		"beforeend",
		FOOTER
	);
};

insertFooter();
