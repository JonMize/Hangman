<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stats Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
session_start();


?>
    
<div class="stats-title-container">
    <div class="stats-title">Game Stats</div>
</div>

<div id="statsPage">

<?php
echo "<h1>Game Statistics</h1>";
echo "<p>Games Played: " . $_SESSION['games_played'] . "</p>";
echo "<p>Games Won: " . $_SESSION['games_won'] . "</p>";
echo "<p>Games Lost: " . $_SESSION['games_lost'] . "</p>";
echo "<p>Easy Wins: " . (isset($_SESSION['easy_wins']) ? $_SESSION['easy_wins'] : 0) . "</p>";
echo "<p>Medium Wins: " . (isset($_SESSION['medium_wins']) ? $_SESSION['medium_wins'] : 0) . "</p>";
echo "<p>Hard Wins: " . (isset($_SESSION['hard_wins']) ? $_SESSION['hard_wins'] : 0) . "</p>";

?>

</div>
<div id="stats_home">
<a class="rem_underline" href="homePage.php"><div class="homepage-button">Home</div></a>
</div>

</body>
</html>