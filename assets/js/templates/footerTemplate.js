const FOOTER = `
<footer class="bg-dark text-center">
    <!-- Copyright -->
    <div class="text-center p-3">
        © 2021 Copyright: Paola y Paris

    </div>
    <!-- Copyright -->
</footer>
</body>
</html>
`;

const insertFooter = () => {
	console.log(document.lastElementChild.lastElementChild);
	document.lastElementChild.lastElementChild.insertAdjacentHTML(
		"beforeend",
		FOOTER
	);
};

insertFooter();
