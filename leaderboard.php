<?php
include 'config.php';

//pak datum
$curdate = date("Y-m-d");

$what = $_GET['q'];

//hier worden de scores uit de database gehaald
if ($what == "a") {

    //alles scores
    $sql = 'SELECT * from game ORDER BY score DESC LIMIT 9';
} else {

    //alleen scores van vandaag
    $sql = 'SELECT * from game WHERE datum = "' . $curdate . '" ORDER BY score DESC LIMIT 9';
}
$result = $mysqli->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Number Remember</title>
    <link rel="icon" href="leaderboard-512.png">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<a href="index.php"><img src="controller-icon-8.png" width="65" style=".float: left; position:absolute; margin-left: 30px"></a>
<div class="leaderboard">
    <h1 id="score">Leaderboard</h1>
</div>
<div class="what">
    <a href="leaderboard.php?q=t" id="today">Today</a>
    <a href="leaderboard.php?q=a" id="all">All-time</a>
    <?php

    if ($what == "a") {
        echo '<script>document.getElementById("all").style.color = "white"</script>';
    }
    if ($what == "t") {
        echo '<script>document.getElementById("today").style.color = "white"</script>';
    }

    ?>
</div>
<div class="board">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo ' 
            <div class="person">
                <div class="personname">
                    <p class="pnaam">' . $row['naam'] . '</p>
                </div>
                <div class="personscore">
                    <p class="pscore">' . $row['score'] . '</p>
                </div>
            </div>';

        }
    }
    ?>
</div>
</body>
</html>

