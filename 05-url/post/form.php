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
        // var_dump($_GET) 
        var_dump($_POST);

        function e($value)
        {
            return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }
        ?>
   
    </pre>



    <form action='form.php' method='POST'>
        <input type='text' name='username' value="<?php if (!empty($_POST['username'])) echo e($_POST['username']) ?>" />
        <input type='password' name='password' />
        <button type='submit' value='Login'>Login</button>
    </form>
</body>

</html>