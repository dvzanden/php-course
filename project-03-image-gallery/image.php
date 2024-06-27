<?php
include './inc/functions.inc.php';
include './inc/images.inc.php';

?>
<?php include './views/header.php'; ?>
<?php

//get passed data
$activeImg = $_GET['image'];

//find key from value passed
$activeImgURL =  array_search($activeImg, $imageTitles);

//get description from passed image in $imageDescriptions
$activeImgDesc = $imageDescriptions[$activeImgURL];

?>

<?php if (!empty($activeImg) && !empty($activeImgURL)) : ?>
    <section>
        <a href='gallery.php'>
            Back
        </a>
        <h2>
            <?= e($activeImg) ?>
        </h2>

        <img src="<?= $BASE_URL_IMG . rawurlencode($activeImgURL) ?>" alt="<?= e($activeImg) ?>" />

        <article>
            <p>
                <?= $activeImgDesc ? e($activeImgDesc) : 'Nothing to display here' ?>
            </p>
        </article>

    </section>
<?php else : ?>
    <h2>404</h2>

<?php endif; ?>


<?php include './views/footer.php'; ?>