<?php
// Language settings (Dutch)
include 'config.php';

$naam = htmlspecialchars($_POST['naam'] ,ENT_QUOTES);
$score = htmlspecialchars($_POST['score'] ,ENT_QUOTES);
$score = $mysqli->real_escape_string($score);
$name = $mysqli->real_escape_string($name);
$score = $score + 1.0 - 1.0;
$safe = $_POST['safe'];
$safe = $safe - 3;
$safe = $safe / 0.546;
$curdate = date("Y-m-d");

//insert gehaalde score
$sql = 'INSERT INTO game (naam,score,datum) values ("' . $naam . '","' . $score . '","' . $curdate . '")';
echo '<br>';

//een score boven de 100 is niet te halen zonder te cheaten.
if (round($score) == round($safe)&& $score < 100) {
    echo 'win';
    $mysqli->query($sql);
    header('Location: leaderboard.php?q=a');

} else {
    echo 'niet cheaten';
}

?>