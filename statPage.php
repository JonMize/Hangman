<?php
session_start();

// Check game result from URL
$result = isset($_GET['result']) ? $_GET['result'] : '';

// Display message based on the result
$message = ($result === 'won') ? "Congratulations! You've won the game!" : "Game Over! Better luck next time.";

// Clear session data to reset the game
if (isset($_POST['play_again'])) {
    session_unset();
    session_destroy();
    header("Location: gamePage.php"); // Redirect to start a new game
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Game Stats</title>
</head>
<body>

<div class="stats-title-container">
    <div class="stats-title">Game Stats</div>
</div>

<div class="stats-container">
    <p><?php echo $message; ?></p>
    <p>Your Word: <?php echo $_SESSION['hidden_word'] ?? ''; ?></p>

    <!-- Play Again Button (below the word message) -->
    <form method="POST">
        <button type="submit" name="play_again" class="play-again-button">Play Again</button>
    </form>
</div>

</body>
</html>
