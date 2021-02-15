import { Grid, html, h } from 'https://unpkg.com/gridjs/dist/gridjs.production.es.min.js';
import { EMPLOYEE_URL } from '../service/employee-service.js';
import { createDeletionModal, createAddModal } from '../util/modals.js';

const columns = [
	{
		id: 'id',
		hidden: true,
	},
	{
		name: 'Name',
		width: '20%',
	},
	{
		name: 'Role',
		width: '20%',
	},
	{
		name: 'Email',
		width: '17%',
		formatter: (_, row) =>
			html(`
				<div class="email-wrapper">
					<span>${row.cells[3].data}</span>
					<a href='mailto:${row.cells[3].data}' class="material-icons">email</a>
				</div>`),
	},
	{
		name: 'Age',
		width: '5%',
	},
	{
		name: 'City',
		width: '8%',
	},
	{
		name: 'Phone Number',
		width: '8%',
	},
	{
		name: h(
			'button',
			{
				className: 'material-icons',
				onClick: createAddModal,
			},
			'person_add'
		),
		width: '60px',
		id: 'delete',
		formatter: (_, row) =>
			h(
				'button',
				{
					className: 'material-icons',
					onClick: (event) =>
						createDeletionModal(event, {
							name: row.cells[1].data,
							id: row.cells[0].data,
						}),
				},
				'delete'
			),
		sort: false,
	},
];

const server = {
	url: EMPLOYEE_URL,
	then: (data) =>
		data.map((employee) => [
			employee.id,
			`${employee.name} ${employee.lastName}`,
			employee.role,
			employee.email,
			employee.age,
			employee.city,
			employee.phoneNumber,
		]),
};

const grid = new Grid({
	sort: true,
	autoWidth: false,
	search: true,
	pagination: true,
	fixedHeader: true,
	editing: true,
	columns: columns,
	server: server,
});

grid.render(document.getElementById('table-wrapper'));

grid.on('rowClick', (...args) => {
	if (!args[0].target.classList.contains('material-icons')) {
		//TODO Navigate to employees
		console.log(args);
	}
});

window.addEventListener('load', () => {
	appendSearchIcon();
	manageInputFocusEvents();
});

function appendSearchIcon() {
	const gridJsSearch = document.querySelector('.gridjs-search');
	const input = gridJsSearch.querySelector('input');
	const searchIcon = document.createElement('i');
	searchIcon.className = 'material-icons gridjs-search-icon';
	searchIcon.innerText = 'search';
	searchIcon.addEventListener('click', () => input.focus());
	gridJsSearch.appendChild(searchIcon);
}

function manageInputFocusEvents() {
	const input = document.querySelector('.gridjs-search input');
	input.addEventListener('focusin', () => input.classList.add('unfolded'));
	input.addEventListener('focusout', () => {
		if (!input.value) {
			input.classList.remove('unfolded');
		}
	});
}

export function update() {
	grid.updateConfig({
		server: server,
	}).forceRender();
	appendSearchIcon();
	manageInputFocusEvents();
}
