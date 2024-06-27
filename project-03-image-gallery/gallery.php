<?php
include './inc/functions.inc.php';
include './inc/images.inc.php';

?>
<?php include './views/header.php'; ?>

<div class="image-gallery">
    <?php foreach ($imageTitles as $file => $title) : ?>
        <a href='image.php?image=<?= e($title) ?>'>
            <div class='image-gallery__item'>
                <h2> <?= e($title) ?></h2>
                <img src='<?= $BASE_URL_IMG . rawurlencode($file) ?>' alt='<?= e($title) ?>' />
            </div>
        </a>
    <?php endforeach; ?>
</div>

<?php include './views/footer.php'; ?>