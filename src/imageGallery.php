<?php
require_once "./library/avatarsApi.php";
?>

<?php if ($avatars = getAvatars()) : ?>
	<div class="d-flex gap-2 flex-wrap w-100 justify-content-center p-2">
		<?php foreach ($avatars as $key => $avatar) : ?>
			<label for="avatar-<?= $key ?>" class="avatar-wrapper position-relative">
				<input type="radio" id="avatar-<?= $key ?>" name="avatar" value="<?= $avatar["photo"] ?>" class="position-absolute visually-hidden" />
				<img class="avatar-img" src="<?= $avatar["photo"] ?>" />
			</label>
		<?php endforeach ?>
	</div>
<?php endif ?>