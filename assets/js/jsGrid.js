$("#jsGrid").jsGrid({
	width: "100%",

	heading: true,
	inserting: true,
	editing: true,
	sorting: true,
	paging: true,
	autoload: true,
	noDataContent: "Not found",

	pageIndex: 1,
	pageSize: 10,
	pageButtonCount: 15,
	pagerFormat: "Pages: {first} {prev} {pages} {next} {last}    {pageIndex} of {pageCount}",
	pagePrevText: "Prev",
	pageNextText: "Next",
	pageFirstText: "First",
	pageLastText: "Last",
	pageNavigatorNextText: "...",
	pageNavigatorPrevText: "...",

	controller: {
		loadData: function (item) {
			return $.ajax({
				type: "GET",
				url: "../resources/employees.json",
				dataType: "json",
				data: JSON.stringify(item),
			});
		},
		insertItem: function (item) {
			$.ajax({
				type: "POST",
				url: "./library/employeeController.php",
				dataType: "json",
				data: JSON.stringify(item),
			});
		},
		deleteItem: function (item) {
			$.ajax({
				type: "DELETE",
				url: "./library/employeeController.php",
				dataType: "json",
				data: JSON.stringify(item),
			});
		},
		updateItem: function (item) {
			$.ajax({
				type: "PUT",
				url: "./library/employeeController.php",
				dataType: "json",
				data: JSON.stringify(item),
			});
		},
	},

	rowClick: function ({ item }) {
		window.location.href = `./employee.php?id=${item.id}`;
	},

	fields: [
		{ name: "id", type: "number", visible: false },
		{ title: "Name", name: "name", type: "text", width: 50, align: "center" },
		{ title: "Last name", name: "lastName", type: "text", width: 50, align: "center" },
		{ title: "Email", name: "email", type: "text", width: 50, align: "center" },
		{ title: "Phone", name: "phoneNumber", type: "text", width: 50, align: "center" },
		{ type: "control" },
	],
});
