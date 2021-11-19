<?php

require_once(LIBRARY . "/avatarsApi.php");

?>

<?php if ($avatars = getAvatars()) : ?>
	<?php if (!isset($avatars["error"])) : ?>
		<?php foreach ($avatars as $key => $avatar) : ?>
			<?php if (!str_contains($avatar["photo"], "https://uifaces.co/images/cooldown-avatar.png")) : ?>
				<button class="avatar-btn" type="button" data-bs-toggle="collapse" href="#avatar-list" role="button" aria-expanded="false" aria-controls="avatar-list">
					<img class="avatar-img" src="<?= $avatar["photo"] ?>" />
				</button>
			<?php endif ?>
		<?php endforeach ?>
	<?php endif ?>
<?php endif ?>