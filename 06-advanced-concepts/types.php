<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <pre>
    <?php
    include  __DIR__ . '/inc/a.inc.php';
    //include_once
    //require
    require_once __DIR__ . '/inc/inc.php';


    // get txt file
    //`file_get_contents` reads the content as a string and outputs it as plain text, without executing any PHP code
    $text_1 = file_get_contents(__DIR__ . '/inc/inc.php');
    echo $text_1;

    // loads first in browser used for images and text
    readfile(__DIR__ . '/inc/inc.php');

    $text = 'php is amazing';

    $text_2 = "PHP, short for \"Hypertext Preprocessor\", is a server-side scripting language first introduced in 1994 by Rasmus Lerdorf. Distributed under a permissive license, PHP is open-source, allowing both personal and commercial use at no cost. It's a cross-platform language, compatible with various server operating systems like Linux, Windows, and macOS, making it highly versatile. The language boasts a large and supportive community, offering an extensive range of libraries, frameworks, and online resources, which has made it a staple for developing dynamic websites and web applications. One of its significant advantages is its seamless integration with relational databases such as MySQL.\nPHP is designed with a syntax that many find user-friendly, although the ease of learning can be subjective and vary from person to person. The language allows for efficient coding; tasks like outputting text can be performed with simple commands like echo. Variables are easily declared, and PHP offers a comprehensive set of control structures, including conditional statements and loops, providing a balance between simplicity and functionality.\nWhile PHP is most commonly used for server-side web development, its capabilities extend beyond that scope. The language has evolved to include command-line scripting and even the creation of desktop applications. However, its primary utility remains in server-side scripting, making it a robust and flexible choice for everything from small websites to complex web-based applications.";

    $splitted = explode("\n", $text_2);

    $merged = implode("----", $splitted);
    var_dump($merged);

    ?>
</pre>

    <?php foreach ($splitted as $p) : ?>
        <p><?= $p ?></p>
    <?php endforeach; ?>


</body>

</html>