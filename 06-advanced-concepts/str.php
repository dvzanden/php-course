<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href="simple.css" />
</head>

<body>
    <pre>
        <?php
        require_once __DIR__ . '/inc/inc.php';

        $text = "PHP, short for \"Hypertext Preprocessor\", is a server-side scripting language first introduced in 1994 by Rasmus Lerdorf. Distributed under a permissive license, PHP is open-source, allowing both personal and commercial use at no cost. It's a cross-platform language, compatible with various server operating systems like Linux, Windows, and macOS, making it highly versatile. The language boasts a large and supportive community, offering an extensive range of libraries, frameworks, and online resources, which has made it a staple for developing dynamic websites and web applications. One of its significant advantages is its seamless integration with relational databases such as MySQL.\nPHP is designed with a syntax that many find user-friendly, although the ease of learning can be subjective and vary from person to person. The language allows for efficient coding; tasks like outputting text can be performed with simple commands like echo. Variables are easily declared, and PHP offers a comprehensive set of control structures, including conditional statements and loops, providing a balance between simplicity and functionality.\nWhile PHP is most commonly used for server-side web development, its capabilities extend beyond that scope. The language has evolved to include command-line scripting and even the creation of desktop applications. However, its primary utility remains in server-side scripting, making it a robust and flexible choice for everything from small websites to complex web-based applications.";

        // var_dump(substr($text, 1));

        //length of text
        var_dump(strlen($text));

        // start or end with
        var_dump(str_starts_with($text, 'PHP'));
        var_dump(str_ends_with($text, 'PHP'));

        // lower/uppercase
        var_dump(strtolower($text));
        var_dump(strtoupper($text));
        //first letter uppercase
        var_dump(ucfirst('php'));

        //remove whit4e space before and after or whatever is being told in second parameter
        var_dump(trim('   danielle   '));
        var_dump(trim('   danielle   ,-', ",-"));

        //find text
        var_dump(strpos($text, 'PHP'));

        //add \n to html
        var_dump(nl2br($text));

        //replace something in a string
        var_dump(str_replace('?', '!', 'Hello World?'));
        var_dump(str_replace(['?', 'World'], ['!', 'Mars'], 'Hello World?'));
        echo str_replace("\n", "</p><p>", e($text));


        ?>
    </pre>
</body>

</html>