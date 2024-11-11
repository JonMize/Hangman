<?php
session_start();


// Check game result from URL
$result = isset($_GET['result']) ? $_GET['result'] : '';
$difficulty = $_SESSION['Difficulty'] ?? 'easy';


// Display message based on the result
$message = ($result === 'won') ? "Congratulations! You've won the game!" : "Game Over! Better luck next time.";

$_SESSION['games_played']++;
if ($result === 'won') {
    $_SESSION['games_won']++;
    if ($difficulty === 'easy') {
        $_SESSION['easy_wins']++;
    } elseif ($difficulty === 'medium') {
        $_SESSION['medium_wins']++;
    } elseif ($difficulty === 'hard') {
        $_SESSION['hard_wins']++;
    }
} else {
    $_SESSION['games_lost']++;
    $_SESSION['games_played']++;
    }



// Clear session data to reset the game
if (isset($_POST['play_again'])) {
    session_unset();
    session_destroy();
    header("Location: difficulty.html"); // Redirect to start a new game
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Game Status</title>
    
</head>
<body>

<div class="stats-title-container">
    <div class="stats-title">Game Status</div>
</div>

<div class="stats-container">
    <p><?php echo $message; ?></p>
    <p>Your Word: <?php echo $_SESSION['hidden_word'] ?? ''; ?></p>

    <!-- Play Again Button (below the word message) -->
    <form method="POST">
        <button type="submit" name="play_again" class="play-again-button">Play Again</button>
    </form>
    <a class="rem_underline" href="statsPage.php"><div class="homepage-button">Stats</div></a>

</div>



</body>
</html>
