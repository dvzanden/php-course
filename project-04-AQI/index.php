<?php
require __DIR__ . '/inc/functions.inc.php';

$data = json_decode(file_get_contents(__DIR__ . '/data/index.json'), true);

?>

<?php require __DIR__ . '/views/header.inc.php'; ?>

<ul>
    <?php foreach ($data as $city) : ?>
        <li>
            <a href="city.php?<?= http_build_query(['city' => $city['city']]); ?>">
                <?= e($city['city']) ?>,
                <?= e($city['country']) ?>
                (<?= e($city['flag']) ?>)
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?php require __DIR__ . '/views/footer.inc.php'; ?>