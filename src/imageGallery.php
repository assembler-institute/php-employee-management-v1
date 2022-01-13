<!-- TODO If you are going to add the extra feature implement here the image selection as a gallery or whatever you like -->
<?php
  require_once "./library/avatarsApi.php";
  $avatars = getAvatarsAPI();
?>

<div class="container">
  <div id="carouselAvatars" class="carouselAvatars carousel" data-ride="carousel">
    <div class="carousel-inner">
      <?php foreach ($avatars as $key => $value) { ?>
        <?= ($key == 0) ? "<div class='carousel-item active'>" : " <div class='carousel-item'>" ?>
        <img  src="<?= $avatars[$key]["image_url"]?>" alt="<?= $avatars[$key]["title"]?>" />
        </div>
      <?php } ?>
    </div>
  </div>
</div>