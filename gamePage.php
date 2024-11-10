<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Hangman</title>
</head>
<body>

<?php
session_start();

$_SESSION['letterGuesses'] = [];
$_SESSION['wrongGuesses'] = 0;
$_SESSION['limitGuesses'] = 6;


if (isset($_GET["Difficulty"])) {
    $_SESSION["Difficulty"] = $_GET["Difficulty"];
}
 else {
    $_SESSION["Difficulty"] = "easy";
}

$diff = $_SESSION["Difficulty"];
$wordFile = $diff . "Words.txt";

echo $wordFile;

$underlineWord = "";

if (file_exists($wordFile)) {
    $word = file($wordFile, FILE_IGNORE_NEW_LINES);
    $_SESSION["word"] = strtoupper($word[array_rand($word)]);

}

$wordtoGuess = $_SESSION['word'];


for ($i = 0; $i < strlen($wordtoGuess); $i++) {
    $letter = $wordtoGuess[$i];
    
    if (in_array($letter, $_SESSION["letterGuesses"])) {
        $underlineWord =  $underlineWord. $letter;
    } else {
        $underlineWord = $underlineWord . " _ ";
    }
}
echo $underlineWord;





?>








<a href = 'homePage.php'><div class="home-button">Home</div></a>

<div class="hangman">

<img src="./images/0.jpg" alt="first_image">
</div>


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