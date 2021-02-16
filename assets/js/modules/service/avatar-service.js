
export const AVATAR_URL = '../src/library/avatarController.php';

export function addAvatar(employeeId, avatarProps, onSuccess) {
	axios.post(AVATAR_URL, JSON.stringify({
		properties: avatarProps,
		employeeId: employeeId
	}))
	.then(onSuccess);
}