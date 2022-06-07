$('#jsGrid').jsGrid({
	width: '100%',
	filtering: true,
	editing: true,
	inserting: true,
	sorting: true,
	paging: true,
	autoload: true,
	pageSize: 15,
	pageButtonCount: 5,
	controller: {
		loadData: function (filter) {
			return $.ajax({
				type: 'GET',
				url: '../src/library/employeeController.php',
				data: filter,
				success: function (response) {
					console.log('GET: ', response)
				},
			})
		},
		insertItem: function (item) {
			return $.ajax({
				type: 'POST',
				url: '../src/library/employeeController.php',
				data: { newEmployee: item },
				success: function (response) {
					console.log('POST: ', response)
				},
			})
		},
		updateItem: function (item) {
			return $.ajax({
				type: 'PUT',
				url: '../src/library/employeeController.php',
				data: { item },
				success: function (response) {
					console.log('PUT: ', response)
				},
			})
		},
		deleteItem: function (item) {
			return $.ajax({
				type: 'DELETE',
				url: '../src/library/employeeController.php',
				data: { itemId: item.id },
				success: function (response) {
					console.log('DELETE: ', response)
				},
			})
		},
	},

	fields: [
		{ name: 'id', type: 'text', width: 30 },
		{ name: 'name', type: 'text', width: 80, title: 'Name' },
		{ name: 'email', type: 'text', width: 100, title: 'Email' },
		{ name: 'age', type: 'number', width: 50, title: 'Age' },
		{ name: 'streetAddress', type: 'text', width: 50, title: 'Street No.' },
		{ name: 'city', type: 'text', width: 100, title: 'City' },
		{ name: 'state', type: 'text', width: 50, title: 'Phone State' },
		{
			name: 'postalCode',
			type: 'text',
			width: 150,
			title: 'Phone Postal Code',
		},
		{ name: 'phoneNumber', type: 'text', width: 150, title: 'Phone Number' },

		{ type: 'control' },
	],
})
