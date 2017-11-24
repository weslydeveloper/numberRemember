<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Number Remember</title>
    <link rel="icon" href="controller-icon-8.png">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<a href="leaderboard.php?q=a"><img src="leaderboard-512.png" width="65"
                                   style="float: left; position:absolute; margin-left: 30px"></a>
<h2 id="highscore" style="right: 30px; position:absolute">High-score: 0</h2>
<div class="score">
    <h1 id="score">Score: 0</h1>
    <p id="good"></p>
    <p id="bad"></p>
</div>
<div class="content">
    <input type="text" id="input" required="required" autofocus>
    <br>
    <input type="button" id="button" value="Click enter to start">
    <h1 id="text" style=""></h1>
</div>
<div class="verstuur" id="verstuur">
    <form action="verstuur.php" method="post">
        <input type="text" id="naam" placeholder="Name" name="naam" required>
        <input type="submit" value="Submit" id="submit">
        <input type="hidden" value="" name="score" id="scorehid">
        <input type="hidden" value="" name="safe" id="safehid">
    </form>
</div>
</body>
<script src="script.js"></script>
</html>