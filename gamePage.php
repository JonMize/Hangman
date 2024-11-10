<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Hangman</title>
</head>
<body>
<a href = 'homePage.php'><div class="home-button">Home</div></a>

<div id="letters">
<form method="POST">
    <?php
    foreach (range('A', 'Z') as $letter) {
        echo "<button type='submit' name='guess' value='$letter'>$letter</button> ";
    }
    ?>
</form>
</div>



</body>
</html>