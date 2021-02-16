import { Grid, html, h } from 'https://unpkg.com/gridjs/dist/gridjs.production.es.min.js';
import { Avataaars } from '../../avataaars.js';
import { Avatar } from '../../Avatar.js';
import { DEF, FEMALE_DEF, MALE_DEF } from '../../default.js';
import { EMPLOYEE_URL } from '../service/employee-service.js';
import { createDeletionModal, createAddModal } from './modals.js';

const columns = [
	{
		id: 'id',
		hidden: true,
	},
	{
		id: 'avatarProps',
		hidden: true
	},
	{
		name: 'Name',
		width: '20%',
		formatter: (cell, row) => {
			let properties = {};
			if(row.cells[1].data) {
				properties = JSON.parse(row.cells[1].data);
			} else {
				if(row.cells[8].data == 'male') {
					properties = MALE_DEF;
				} else if(row.cells[8].data == 'female') {
					properties = FEMALE_DEF;
				} else {
					properties = DEF;
				}
			}
			properties.width = 50;
			return html(`
				${Avataaars.create(properties)}
				<span>${cell}</span>
			`)
		}
	},
	{
		name: 'Role',
		width: '20%',
	},
	{
		name: 'Email',
		width: '17%',
		formatter: cell => 
			html(`
				<div class="email-wrapper">
					<span>${cell}</span>
					<a href='mailto:${cell}' class="material-icons">email</a>
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
							name: row.cells[2].data,
							id: row.cells[0].data,
						}),
				},
				'delete'
			),
		sort: false,
	},
	{
		id: 'gender',
		hidden: true
	}
];

const server = {
	url: EMPLOYEE_URL,
	then: (data) =>
		data.map((employee) => {
			return [
				employee.id,
				employee.avatar ? JSON.stringify(employee.avatar.properties) : false,
				`${employee.name} ${employee.lastName}`,
				employee.role,
				employee.email,
				employee.age,
				employee.city,
				employee.phoneNumber,
				employee.gender
			];
		}),
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
		window.location.href = `http://localhost/php-employee-management-v1/src/employee.php?id=${args[1].cells[0].data}`;
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
