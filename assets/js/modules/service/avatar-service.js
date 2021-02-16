
export const AVATAR_URL = '../src/library/avatarController.php';

export function addAvatar(employeeId, avatarProps, onSuccess) {

	axios.post(AVATAR_URL, {
		properties: avatarProps,
		id: employeeId
	}, { headers: { 'Content-Type': 'multipart/form-data' } })
	.then(onSuccess);
}