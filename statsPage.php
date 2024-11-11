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
echo "<p>Games Played: " . (isset($_SESSION['games_played']) ? $_SESSION['games_played'] : 0) . "</p>";
echo "<p>Games Won: " . (isset($_SESSION['games_won']) ? $_SESSION['games_won'] : 0) . "</p>";
echo "<p>Games Lost: " . (isset($_SESSION['games_lost']) ? $_SESSION['games_lost'] : 0) . "</p>";
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