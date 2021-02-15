let modalWrapper = null;

export function openModal(modal) {
	closeModal();
	modalWrapper = document.createElement('div');
	modalWrapper.className = 'modal-wrapper appearing';

	modalWrapper.addEventListener('click', closeModalOnClickOut);
	modalWrapper.addEventListener('animationend', removeAppearingClass);

	let modalContainer = document.createElement('div');
	modalContainer.className = 'modal-container';

	if (modal.classes) {
		modal.classes.forEach((className) => {
			modalContainer.classList.add(className);
		});
	}
	if (modal.styles) {
		Object.entries(modal.styles).forEach(([key, value]) => {
			modalContainer.style[key] = value;
		});
	}

	modalContainer.appendChild(modal.node);
	modalWrapper.appendChild(modalContainer);
	document.body.appendChild(modalWrapper);
}

function closeModalOnClickOut(event) {
	if (event.target === modalWrapper) {
		closeModal();
	}
}

function removeAppearingClass(event) {
	if (event.target === modalWrapper) {
		modalWrapper.classList.remove('appearing');
		modalWrapper.removeEventListener('animationend', removeAppearingClass);
	}
}

export function closeModal() {
	if (modalWrapper) {
		modalWrapper.classList.add('disappearing');
		modalWrapper.addEventListener('animationend', () => modalWrapper.remove());
	}
}
