<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./simple.css" />
    <title>Document</title>
</head>

<body>
    <?php
    function e($value)
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }

    $pages = [
        'citrus_salmon' => "Citrus Salmon",
        'mediterranian_pasta' => "Mediterranean Marvel Pasta",
        'tropical_tacos' => "Tropical Tango Tacos",
        'sunset_risotto' => "Sunset Risotto"
    ];

    ?>

    <form method="get" action="include.php">
        <select name="page">
            <option value="">Please select an option</option>
            <?php foreach ($pages as $page => $name) : ?>
                <option value="<?= e($page) ?>" <?php if (!empty($_GET['page']) && $_GET['page'] == $page) echo 'selected' ?>>
                    <?= e($name) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <input type='submit' value="submit" />
    </form>
    <?php
    if (!empty($_GET['page'])) {
        $page = $_GET['page'];
        if (in_array($page, array_keys($pages))) {
            echo file_get_contents("pages/{$page}.html");
        }
    }
    ?>

</body>

</html>