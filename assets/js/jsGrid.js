import { controller } from "./employeeController.js";

jsGrid.setDefaults("text", {
	css: "overflow-hidden",
});

$("#jsGrid").jsGrid({
	controller: controller,

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

	rowClick: function ({ item }) {
		window.location.href = `./employee.php?id=${item.id}`;
	},

	fields: [
		{ name: "id", type: "number", visible: false },
		{
			title: "Name",
			name: "name",
			type: "text",
			width: 50,
			align: "center",
			validate: "required",
		},
		{
			title: "Age",
			name: "age",
			type: "text",
			width: 25,
			align: "center",
			validate: "required",
			validate: "required",
		},
		{
			title: "Email",
			name: "email",
			type: "text",
			width: 50,
			align: "center",
			validate: "required",
		},
		{
			title: "Phone",
			name: "phoneNumber",
			type: "text",
			width: 50,
			align: "center",
			validate: "required",
		},
		{
			title: "Address",
			name: "streetAddress",
			type: "text",
			width: 50,
			align: "center",
			validate: "required",
		},
		{
			title: "Postal code",
			name: "postalCode",
			type: "text",
			width: 30,
			align: "center",
			validate: "required",
		},
		{
			title: "City",
			name: "city",
			type: "text",
			width: 50,
			align: "center",
			validate: "required",
		},
		{
			title: "State",
			name: "state",
			type: "text",
			width: 40,
			align: "center",
			validate: "required",
		},
		{ type: "control", width: 20 },
	],
});

// {
// 	loadData: function (item) {
// 		return $.ajax({
// 			type: "GET",
// 			url: "../resources/employees.json",
// 			dataType: "json",
// 			data: JSON.stringify(item),
// 		});
// 	},
// 	insertItem: function (item) {
// 		$.ajax({
// 			type: "POST",
// 			url: "./library/employeeController.php",
// 			dataType: "json",
// 			data: JSON.stringify(item),
// 			done: function (data) {
// 				console.log(data);
// 			},
// 		});
// 	},
// 	deleteItem: function (item) {
// 		$.ajax({
// 			type: "DELETE",
// 			url: "./library/employeeController.php",
// 			dataType: "json",
// 			data: JSON.stringify(item),
// 		});
// 	},
// 	updateItem: function (item) {
// 		$.ajax({
// 			type: "PUT",
// 			url: "./library/employeeController.php",
// 			dataType: "json",
// 			data: JSON.stringify(item),
// 		});
// 	},
// },
