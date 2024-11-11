<?php
session_start();

// Load words based on difficulty level
function loadWord($difficulty) {
    $fileMap = [
        'easy' => 'easyWords.txt',
        'medium' => 'mediumWords.txt',
        'hard' => 'hardWords.txt'
    ];

    $filePath = $fileMap[$difficulty];
    $words = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return $words[array_rand($words)];
}

if (!isset($_SESSION['hidden_word'])) {
    $difficulty = $_GET['Difficulty'] ?? 'easy';
    $_SESSION['hidden_word'] = loadWord($difficulty);
    $word = $_SESSION['hidden_word'];
    $_SESSION['display_word'] = substr($word, 0, 1) . str_repeat('-', strlen($word) - 2) . substr($word, -1); // Reveal first and last letters
    $_SESSION['attempts'] = 7; // Set attempts to match the number of images (0.jpg to 6.jpg)
    $_SESSION['guessed_letters'] = [];
}

// Process the guessed letter
if (isset($_POST['guess'])) {
    $guess = strtolower($_POST['guess']);
    if (!in_array($guess, $_SESSION['guessed_letters'])) {
        $_SESSION['guessed_letters'][] = $guess;
        if (strpos($_SESSION['hidden_word'], $guess) !== false) {
            for ($i = 1; $i < strlen($_SESSION['hidden_word']) - 1; $i++) {
                if ($_SESSION['hidden_word'][$i] === $guess) {
                    $_SESSION['display_word'][$i] = $guess;
                }
            }
        } else {
            $_SESSION['attempts']--;
        }
    }
}

// Check for game end and redirect to gameStatus.php
if ($_SESSION['attempts'] <= 0 || strpos($_SESSION['display_word'], '-') === false) {
    $result = ($_SESSION['attempts'] <= 0) ? 'lost' : 'won';
    header("Location: gameStatus.php?result=$result");
    exit();
}

// Select the appropriate image based on attempts left
$image_number = 7 - $_SESSION['attempts']; // Calculate image number (0.jpg to 6.jpg)
$image_path = "images/$image_number.jpg"; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Hangman Game</title>
</head>
<body>

<h1>Hangman Game</h1>
<p>Word: <?php echo $_SESSION['display_word']; ?></p>
<p>Attempts left: <?php echo $_SESSION['attempts']; ?></p>

<!-- Display guessed letters -->
<p>Guessed letters: <?php echo implode(', ', $_SESSION['guessed_letters']); ?></p>

<!-- Hangman Image Display -->
<div id="hangman-drawing">
    <img src="<?php echo $image_path; ?>" alt="Hangman image for current attempt" style="width: 200px; height: 400px;">
</div>

<!-- Letter Guess Form -->
<div id="letters">
    <form method="POST">
        <?php foreach (range('a', 'z') as $letter): ?>
            <?php if (!in_array($letter, $_SESSION['guessed_letters'])): ?>
                <button type="submit" name="guess" value="<?php echo $letter; ?>"><?php echo strtoupper($letter); ?></button>
            <?php endif; ?>
        <?php endforeach; ?>
    </form>
</div>

<div class="buttons">
<a class="rem_underline" href="homePage.php"><div class="homepage-button">Home</div></a>
<a class="rem_underline" href="statsPage.php"><div class="homepage-button">Stats</div></a>

</div>


</body>
</html>
