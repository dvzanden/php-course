<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/simple.css" />
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Automatic Image List</h1>
    </header>
    <main>
        <pre><?php
                $handle = opendir(__DIR__ . '/images');

                while (($currentFile = readdir($handle)) !== false) {

                    $imgFile = pathinfo($currentFile, PATHINFO_EXTENSION);
                    if ($imgFile === 'jpg') $images[] = $currentFile;
                    //if (str_contains($currentFile, 'jpg')) $images[] = $currentFile;
                };
                var_dump($images);
                ?></pre>

        <?php foreach ($images as $image) : ?>
            <img src='images/<?= rawurldecode($image) ?>' />
        <?php endforeach; ?>
    </main>
</body>

</html>