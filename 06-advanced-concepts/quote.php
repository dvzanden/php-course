<pre>
<?php
$emailContent = "Subject: Unlock Your Potential with Us!\n\nDear Alex,\n\nWe hope this message finds you well.\n\nQuote of the Month:\n\nDr. Albert Szent-Györgyi: 'Innovation is seeing what everybody has seen and thinking what nobody has thought.'\n\nBest wishes,\nYour Discovery Network Team\nP.S. Don't miss our special announcement next month!";

$content = explode("\n\n", $emailContent);
$qotm = explode(":", $content[4]);

$author = $qotm[0];
$quote = $qotm[1];

asort($qotm);
$newQuote = implode(" - ", $qotm);

$content[4] = $newQuote;

$modifiedEmailContent = implode("\n\n", $content);


var_dump($modifiedEmailContent);
?>
</pre>

<article>
    <?= $emailContent ?>
</article>