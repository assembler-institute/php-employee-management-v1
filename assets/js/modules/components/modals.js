import { Avatar } from '../../Avatar.js';
import { addEmployee, deleteEmployee } from '../service/employee-service.js';
import { addAvatar } from '../service/avatar-service.js';
import { closeModal, openModal } from '../util/modal.js';
import { createAvatarModal } from '../../avatarModal.js';
import { update } from './table.js';

export function createAddModal() {
	const addModal = document.createElement('div');
	addModal.className = 'add-modal';
	const myAvatar = new Avatar('other');
	addModal.innerHTML = `
    <h3 class="modal-title">Add new employee</h3>
    <div class="modal-image" id="modal-image">${myAvatar.getAvatar({ width: 300 })}</div>
    <form action="http://localhost/php-employee-management-v1/src/library/employeeController.php" method="POST">
        <div class="fields">
            <div class="labeled-input">
                <label for="name">Name</label>
                <input type="text" name="name" required class="modal__input">
            </div>
            <div class="labeled-input">
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" required class="modal__input">
            </div>
            <div class="labeled-input">
                <label for="age">Age</label>
                <input min=10 max=100 type="number" name="age" class="modal__input">
            </div>
            <div class="labeled-input">
                <label for="age">Gender</label>
                <select required type="select" name="gender" class="modal__input">
                    <option value="male">Male</option>                   
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
        </div>

        <div class="fields">
            <div class="labeled-input">
                <label for="role">Role</label>
                <input type="text" name="role" required class="modal__input">
            </div>
            <div class="labeled-input">
                <label for="email">Email</label>
                <input type="email" name="email" required class="modal__input">
            </div>
            <div class="labeled-input">
                <label for="phoneNumber">Phone Number</label>
                <input type="phone" name="phoneNumber" class="modal__input">
            </div>
        </div>
        <div class="fields">
            <div class="labeled-input">
                <label for="city">City</label>
                <input type="text" name="city" class="modal__input">
            </div>
            <div class="labeled-input">
                <label for="state">State</label>
                <input type="text" name="state" class="modal__input">
            </div>
            <div class="labeled-input">
                <label for="country">Country</label>
                <input type="text" name="country" class="modal__input">
            </div>
        </div>
        <div class="fields">
            <div class="labeled-input">
                <label for="githubLink">Github</label>
                <input type="text" name="githubLink" class="modal__input">
            </div>
            <div class="labeled-input">
                <label for="linkedinLink">Linkedin</label>
                <input type="text" name="linkedinLink" class="modal__input">
            </div>
        </div>
        <label for="submit" hidden>Submit</label>
        <input type="submit" name="submit" class="modal__input">
    </form>
    `;
	addModal.querySelector('form').addEventListener('submit', (event) => {
		console.log(myAvatar.getProperties());
		event.preventDefault();
		const formData = new FormData(event.target);
		addEmployee(formData, (response) => {
			addAvatar(response.data.id, myAvatar.getProperties(), () => {
				closeModal();
				update();
			});
		});
	});

	let callback = (avatarProps) => {
		myAvatar.setProperties(avatarProps);
		repaintAvatar();
	};

	addModal
		.querySelector('#modal-image')
		.addEventListener('click', () => createAvatarModal('other', myAvatar.getProperties(), callback));

	function repaintAvatar() {
		document.querySelector('#modal-image').innerHTML = myAvatar.getAvatar({ width: 300 });
	}

	openModal({
		node: addModal,
		classes: ['add-modal-container'],
		styles: {
			position: 'fixed',
			top: '50%',
			left: '50%',
			transform: 'translate(-50%,-50%)',
		},
	});
}

export function createDeletionModal(event, employee) {
  const right = window.innerWidth - event.clientX + "px";
  const top = event.clientY + "px";

  const delModal = document.createElement("div");
  delModal.className = "deletion-modal";
  delModal.innerHTML = `
    <button class="button__close material-icons">close</button>
    <div class="message"> Confirm deletion of <a class="employee">${employee.name}</a></div>
    <button class="modal__input button__delete">Yes</button>
    `;
	delModal.querySelector('.button__delete').addEventListener('click', () => {
		deleteEmployee(employee.id, update);
		closeModal();
	});

  openModal({
    node: delModal,
    classes: ["deletion-modal-container"],
    styles: {
      position: "fixed",
      top: top,
      right: right,
    },
  });
}
