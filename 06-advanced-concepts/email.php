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
        $emailContent = "Dear alex  ,\n\nWe hope this message finds you well.\n\nThis month, we are focusing on personal growth and innovation. Don't miss out on our exclusive insights!\n\nBest wishes,\nYour Discovery Network Team\nP.S. Check out our latest blog post!";


        //Create a preview snippet from the email content. The preview should include the first 30 characters following the 
        //'Dear [Name],\n\n' greeting, appended with '...' to indicate more content follows.
        //Be mindful that each newline character (\n) is counted as a single character
        //Save this preview text to a new variable called $emailPreview

        //all text in array
        $content = explode("\n\n", $emailContent);

        //first line Greeting
        $greetingIndex = array_search('Dear alex  ,', $content);
        $greeting = $content[$greetingIndex];

        //secondline for preview/snippet
        $snippet = $content[$greetingIndex + 1];

        $emailPreview = substr($snippet, 0, 30) . '...';

        var_dump('emailpreview: ' . $emailPreview);

        //Isolate the main body of the email, excluding the salutation, and signature.
        //the salutation always ends with "Dear [Name],\n\n" and the signature always starts with 
        //"Best wishes,\nYour Discovery Network Team".
        //Calculate and save the number of characters in this section to a new variable called $charCount.

        foreach ($content as $k => $v) {
            if (str_starts_with($v, 'Dear')) {
                unset($k);
                continue;
            }
            if (str_starts_with($v, 'Best wishes')) {
                unset($k);
                continue;
            }
            $mainBody[] = $v;
        }
        $charCount = strlen(implode($mainBody));
        var_dump('charcount: ' . $charCount);

        //Locate and extract the name used in the salutation ("Dear [Name],").  
        //Pay attention to potential whitespace around the name and remove it
        //Reformat the name so the first letter is uppercase and the remainder are lowercase, 
        //adjusting for any original formatting inconsistencies.
        //Update the email content with the standardized name format, ensuring the original message's 
        //integrity is preserved. Save the updated email content to a new variable called $updatedEmailContent

        $greetingContent = explode(' ', $greeting);
        $name = $greetingContent[1];
        foreach ($greetingContent as $k => $v) {
            if (empty($v)) {
                unset($v);
                continue;
            }
            // if ($v == $name) {
            //     $v = ucfirst($v);
            //     continue;
            // }
            $removedWhitespace[] = $v;
        }

        var_dump($removedWhitespace, $name);

        ?>

</body>

</html>