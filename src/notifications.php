<aside id="notification-box" style="z-index: 1" class="position-absolute top-0 end-0 m-3">
	<?php foreach (["success", "danger", "info"] as $type) : ?>
		<?php if ($messages = popSessionValue($type)) : ?>
			<?php foreach ($messages as $message) : ?>
				<div class="alert alert-<?= $type ?> alert-dismissible fade show my-1 mx-1" role="alert">
					<?= $message ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php endforeach ?>
		<?php endif ?>
	<?php endforeach ?>
</aside>