<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Homepage</title>
</head>
<body>
<?php
session_start();

?>
    <div class="homepage-title-container">
        <div class="homepage-title">GSU HangMan</div>
    </div>
    <div class="homepage-buttons-container">
        <a class="rem_underline" href="difficulty.html"><div class="homepage-button">Play</div></a>
        <a class="rem_underline" href="statsPage.php"><div class="homepage-button">Stats</div></a>
        <div class="homepage-button">Reset Stats</div>
    </div>
    

    <?php


if (!isset($_SESSION['games_played'])) {
    $_SESSION['games_played'] = 0;
    $_SESSION['games_won'] = 0;
    $_SESSION['games_lost'] = 0;
    $_SESSION['easy_wins'] = 0;
    $_SESSION['medium_wins'] = 0;
    $_SESSION['hard_wins'] = 0;
}
?>

</body>
</html>