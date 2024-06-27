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


        $courses = [
            [
                'title' => 'German for Beginners',
                'desc' => 'Learn basic German vocabulary, grammar, and everyday phrases.',
                'flag' => '🇩🇪',
                'topics' => [
                    'Introduction to German Alphabet and Sounds',
                    'Basic Greetings and Farewells',
                    'Numbers and Counting',
                    'Common Verbs and Basic Sentence Structures',
                    'Everyday Phrases for Simple Conversations',
                    'Asking and Giving Directions',
                    'Food and Dining Vocabulary',
                    'Basic Grammar Rules: Articles and Cases'
                ],
            ],
            [
                'title' => 'French for Beginners',
                'desc' => 'Master fundamental French skills including basic vocabulary and conversational techniques.',
                'flag' => '🇫🇷',
                'topics' => [
                    'Basics of French Pronunciation',
                    'Introducing Yourself and Others',
                    'Numbers, Time, and Dates',
                    'Everyday Phrases for General Conversations',
                    'Basic French Grammar: Subject-Verb Agreement',
                    'Travel-Related Vocabulary and Phrases',
                    'Food, Drinks, and Dining Out',
                    'Clothing and Shopping Vocabulary'
                ]
            ],
            [
                'title' => 'Spanish for Beginners',
                'desc' => 'Acquire essential Spanish vocabulary and gain proficiency in daily conversations.',
                'flag' => '🇪🇸',
                'topics' => [
                    'Spanish Alphabets and Sounds',
                    'Basic Greetings and Introductions',
                    'Numbers and Basic Mathematics',
                    'Essential Phrases for Everyday Use',
                    'Common Verbs and Their Conjugations',
                    'Navigational Vocabulary: Directions and Locations',
                    'Basic Food Vocabulary and Ordering at a Restaurant',
                    'Understanding Gender and Articles in Spanish'
                ]
            ],
            [
                'title' => 'Chinese for Beginners',
                'desc' => 'Learn essential Mandarin Chinese vocabulary and basic conversational skills.',
                'flag' => '🇨🇳',
                'topics' => []
            ]
        ];

        foreach ($courses[2]['topics'] as $topics) {
            var_dump($topics);
        }

        ?>
    </pre>

    <?php foreach ($courses as $course) : ?>
        <details>
            <summary><?= e($course['flag']) ?><?= e($course['title']) ?></summary>
            <p><?= e($course['desc']) ?></p>
            <?php if (!empty($course['topics'])) : ?>
                <ul>
                    <?php foreach ($course['topics'] as $topic) : ?>
                        <li><?= $topic ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </details>
    <?php endforeach; ?>
</body>

</html>