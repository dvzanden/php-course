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
        $emailTemplate = "Dear [NAME],\n\nWe're excited to share with you this week's featured article:\n\n

        [ARTICLE]\n\n

        Upcoming Events:\n

        [EVENTS]\n\n

        Best regards,
        \nYour Friendly Team";

        $recipient = ['name' => 'Alice', 'segment' => 'Tech Enthusiast', 'email' => 'alice@example.com'];
        $segmentContent = [
            'Tech Enthusiast' => "The Latest in Tech: Top Gadgets",
            'Health Guru' => "Transform Your Lifestyle: The Best of Health and Fitness",
        ];
        $events = [
            "Webinar on Future Tech Trends",
            "Photography Workshop",
            "Health and Wellness Retreat"
        ];

        //Personalize the Email Template: Begin with the base email template. 
        //Personalize this template by replacing the [NAME] placeholder with the recipient's actual name. 
        //Store the result in a new variable $personalizedEmail.

        $personalizedEmail = str_replace('[NAME]', $recipient['name'], $emailTemplate);


        //Adjust Content for Audience Segments: Further customize $personalizedEmail by replacing the [ARTICLE] 
        //placeholder with content tailored to the recipient's interest segment. Use the $segmentContent array to
        // find the relevant article for each recipient's segment. Update $personalizedEmail with this new content.


        $article = $segmentContent[$recipient['segment']] ?? '';
        $personalizedEmail = str_replace('[ARTICLE]', $article, $personalizedEmail);

        //Include Information on Upcoming Events: Update $personalizedEmail by replacing the [EVENTS] 
        //placeholder with a formatted list of upcoming events. Utilize the $events array to create this list, 
        //ensuring all relevant event information is included in $personalizedEmail.

        $eventList = "<li>" . implode("<li>", $events) . "</li>";

        $personalizedEmail = str_replace('[EVENTS]', '<ul>' . $eventList . '</ul>', $personalizedEmail);

        var_dump($personalizedEmail);

        ?>

</body>

</html>