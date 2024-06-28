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
                $images = [];
                $allowedExtenstions = [
                    'jpg',
                    'jpeg',
                    'png',
                ];

                while (($currentFile = readdir($handle)) !== false) {

                    $extention = pathinfo($currentFile, PATHINFO_EXTENSION);

                    if (!in_array($extention, $allowedExtenstions)) continue;

                    $title = '';
                    $content = [];

                    $fileName = pathinfo($currentFile, PATHINFO_FILENAME);
                    $txtFile = __DIR__ . '/images/' . $fileName . '.txt';

                    if (file_exists($txtFile)) {
                        $txt = file_get_contents($txtFile);
                        $info = explode("\n", $txt);
                        $title = $info[0];
                        unset($info[0]);
                        $content = array_values($info);
                    }


                    $images[] = [
                        'image' => $currentFile,
                        'title' => $title,
                        'content' => $content
                    ];
                };




                ?></pre>

        <?php foreach ($images as $image) : ?>
            <h1><?= $image['title'] ?></h1>
            <img src='images/<?= rawurldecode($image['image']) ?>' />
            <article>
                <?php foreach ($image['content'] as $v) : ?>
                    <p><?= $v ?></p>
                <?php endforeach; ?>
            </article>
        <?php endforeach; ?>
    </main>
</body>

</html>