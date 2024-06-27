<?php

if (!isset($bg)) {
  $bg = 'images/pexels-engin-akyurt-1435904.jpg';
};
if (!isset($pageTitle)) {
  $pageTitle = '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/simple.css" />
  <link rel="stylesheet" href="./styles/custom.css" />
  <title>Culinary Cove &bull; <?php echo $pageTitle ?></title>
</head>

<body>
  <header class="header-with-background" style="background-image: url('<?= $bg ?>'); ">
    <h1>Culinary Cove</h1>
    <p>Your sanctuary for exceptional flavors</p>
    <nav>
      <a href="our-mission.php" <?php if ($pageKey === 'mission') : ?> class='active' <?php endif; ?>>
        Our mission
      </a>
      <a href="ingredients.php" <?php if ($pageKey === 'ingredients') : ?> class='active' <?php endif; ?>>
        Ingredients
      </a>
      <a href='menu.php' <?php if ($pageKey === 'menu') : ?> class='active' <?php endif; ?>>Menu</a>
    </nav>
  </header>
  <main>